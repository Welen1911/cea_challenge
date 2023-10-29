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
            $filmesDis = Filme::where('amount', '>', '0')->get();
            $filmesIndis = Filme::where('amount', '=', '0')->get();

            return view('users.dashboard.filmes', compact('filmesDis', 'filmesIndis'));
        } else {
            $vendas = Venda::where('user_id', '=', auth()->user()->id)->get();
            $filmes = [];
            foreach ($vendas as $venda) {
                $filme = Filme::findOrFail($venda->filme_id);
                $filme->amount = $venda->amount;
                array_push($filmes, $filme);
            }

            return view('users.dashboard.filmes', compact('filmes'));
        }
    }


    public function buy(Request $request, string $id)
    {
        $filme = Filme::findOrFail($id);
        if ($filme->amount == 0 || $request->amount > $filme->amount) {
            dd("Deu errado!");
        } else {
            $venda = new Venda();
            $venda->filme_id = $filme->id;
            $venda->user_id = auth()->user()->id;
            $venda->amount = $request->amount;
            $venda->save();

            $filme->amount -= $request->amount;
            $filme->update();
        }
        return redirect('/dashboard');
    }
}
