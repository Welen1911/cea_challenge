<?php

namespace App\Http\Controllers\Filme;

use App\Http\Controllers\Controller;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function create() {
        return view('Filme.cadastro');
    }

    public function store(Request $request) {
        $filme = new Filme();

        $filme->title = $request->title;
        $filme->description = $request->description;
        $filme->amount = $request->amount;
        $filme->price = $request->price;

        $filme->save();

        return redirect()->route('list.film');
    }


    public function index() {
        $filmes = Filme::all();

        return view('Filme.Listar', ['filmes' => $filmes]);
    }

    public function show(string $id) {
        $filme = Filme::findOrFail($id);

        return view('Filme.Show', ['filme' => $filme]);
    }

    public function edit(string $id) {
        $filme = Filme::findOrFail($id);

        return view('Filme.Edit', ['filme' => $filme]);
    }

    public function update(string $id, Request $request) {
        $filme = Filme::findOrFail($id);

        $filme->title = $request->title;
        $filme->description = $request->description;
        $filme->amount = $request->amount;
        $filme->price = $request->price;

        $filme->update();

        return redirect()->route('list.film');
    }

    public function destroy(string $id) {
        $filme = Filme::findOrFail($id);

        $filme->delete();

        return redirect('/');
    }
}
