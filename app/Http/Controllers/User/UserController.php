<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Filme;
use App\Models\Venda;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->tipo_conta == 'admin') {
            $filmesDisp = Filme::where('amount', '>', '0')->get();

            $filmesInd = Filme::where('amount', '=', '0')->get();
            return view('dashboard', compact('filmesDisp', 'filmesInd'));
        } else {
            dd('Você não é Admin KKKKKKKKKKKKKKKKKKKKKK');
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
