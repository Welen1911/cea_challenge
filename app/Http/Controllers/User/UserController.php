<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Filme;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->tipo_conta) {
            $filmesDisp = Filme::where('amount', '>', '0')->get();

            $filmesInd = Filme::where('amount', '=', '0')->get();
            return view('dashboard', compact('filmesDisp', 'filmesInd'));
        } else {
            dd('Você não é Admin KKKKKKKKKKKKKKKKKKKKKK');
        }
    }
}
