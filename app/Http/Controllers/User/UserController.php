<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Filme;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function vendas()
    {
        if (auth()->user()->tipo_conta == 'admin') {
            $vendas = Venda::all();
            foreach ($vendas as $venda) {
                $filme = Filme::findOrFail($venda->filme_id);
                $venda->filme = $filme;

                $user = User::findOrFail($venda->user_id);
                $venda->user = $user;
            }
            return view('users.dashboard.vendas', compact('vendas'));
        } else return redirect()->route('dashboard.filmes');
    }

    public function filmes()
    {
        if (auth()->user()->tipo_conta == 'admin') {
            $filmes = Filme::all();
            $filmesDis = [];
            $filmesIndis = [];
            $filmesDeleted = [];

            foreach ($filmes as $filme) {
                if ($filme->amount > 0 && $filme->isDeleted == null) array_push($filmesDis, $filme);
                else if ($filme->amount == 0 && $filme->isDeleted == null) array_push($filmesIndis, $filme);
                else array_push($filmesDeleted, $filme);
            }

            return view('users.dashboard.filmes', compact('filmesDis', 'filmesIndis', 'filmesDeleted'));
        } else {
            $vendas = Venda::where('user_id', '=', auth()->user()->id)->get();
            $filmes = [];
            foreach ($vendas as $venda) {
                $filme = Filme::findOrFail($venda->filme_id);
                $filme->amount = $venda->amount;
                array_push($filmes, $filme);
            }

            return view('users.dashboard.filmesUser', compact('filmes'));
        }
    }

    public function restore(string $id)
    {
        $filme = Filme::findOrFail($id);
        if ($filme->isDeleted) {
            $filme->isDeleted = null;
            $filme->update();

            return redirect('/')->with('msg', 'Filme restaurado com sucesso!');
        }

        return redirect('/');
    }

    public function destroy(string $id)
    {
        $vendas = Venda::where('filme_id', '=', $id)->get();
        foreach ($vendas as $venda) {
            $venda->delete();
        }

        $filme = Filme::findOrFail($id);
        if ($filme->image != "capa_padrao.jpg") {
            unlink(public_path('images/' . $filme->image));
        }

        $filme->delete();
        return redirect('/dashboard')->with('msg', 'Filme deletado junto com suas vendas respectivas!');
    }

    public function buy(Request $request, string $id)
    {
        $filme = Filme::findOrFail($id);
        if ($filme->amount == 0 || $request->amount > $filme->amount) {
            return redirect('/')->with('msg', 'Este filme não está em estoque!');
        } else {
            $venda = new Venda();
            $venda->filme_id = $filme->id;
            $venda->user_id = auth()->user()->id;
            $venda->amount = $request->amount;
            $venda->save();

            $filme->amount -= $request->amount;
            $filme->update();
        }
        return redirect('/dashboard')->with('msg', 'Filme comprado!');
    }

    public function devolution(string $id)
    {
        $vendas = Venda::where('filme_id', '=', $id)->get();

        foreach ($vendas as $venda) {
            if ($venda->user_id == auth()->user()->id) {
                $vendas = $venda;
                break;
            }
        }

        $filme = Filme::findOrFail($id);
        $filme->amount += $vendas->amount;

        $filme->update();

        $vendas->delete();

        return redirect()->route('dashboard')->with('msg', 'Filme Devolvido com sucesso!');
    }
}
