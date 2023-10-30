<?php

namespace App\Http\Controllers\Filme;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Filme;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index()
    {
        $search = request('search');
        $searchCategory = request('categoria');

        if ($search) {
            $filmes = Filme::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
            if (count($filmes) == 0) {
                $categoria = Categoria::where([[
                    'name', 'like', '%' . $search . '%'
                ]])->first();

                if ($categoria) {
                    $filmes = Filme::where([[
                        'categoria', '=', $categoria->id
                    ]])->get();
                } else return redirect()->route('list.film');
            }
        } else {
            $filmes = Filme::where('isDeleted', '=', null)->get();
        }
        $categorias = Categoria::all();

        foreach ($filmes as $filme) {
            foreach ($categorias as $categoria) {
                if ($filme->categoria == $categoria->id) {
                    $filme->categoria = $categoria->name;
                }
            }
        }

        return view('welcome', compact('filmes', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('Filme.cadastro', compact('categorias'));
    }

    public function store(Request $request)
    {
        $filme = new Filme();

        $filme->title = $request->title;
        $filme->description = $request->description;
        $filme->amount = $request->amount;
        $filme->price = $request->price;
        $filme->categoria = $request->categoria;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." . $request->image->getClientOriginalExtension();

            $request->image->move(public_path('/images'), $imageName);

            $filme->image = $imageName;
        } else {
            $filme->image = "capa_padrao.jpg";
        }

        $filme->save();

        return redirect()->route('list.film')->with('msg', 'Filme adicionado!');
    }

    public function show(string $id)
    {
        $filme = Filme::findOrFail($id);

        return view('Filme.Show', ['filme' => $filme]);
    }

    public function edit(string $id)
    {
        $filme = Filme::findOrFail($id);
        $categorias = Categoria::all();

        return view('Filme.Edit', compact('filme', 'categorias'));
    }

    public function update(string $id, Request $request)
    {
        $filme = Filme::findOrFail($id);

        $filme->title = $request->title;
        $filme->description = $request->description;
        $filme->amount = $request->amount;
        $filme->price = $request->price;
        $filme->categoria = $request->categoria;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($filme->image != "capa_padrao.jpg" && $filme->image != NULL) {
                unlink(public_path('images/' . $filme->image));
            }
            $requestImage = $request->image;

            $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." . $request->image->getClientOriginalExtension();

            $request->image->move(public_path('/images'), $imageName);

            $filme->image = $imageName;
        }

        $filme->update();

        return redirect()->route('list.film')->with('msg', 'Filme atualizado!');
    }

    public function destroy(string $id)
    {
        $filme = Filme::findOrFail($id);
        $venda = Venda::where('filme_id', '=', $id)->get();

        if (count($venda) == 0) {
            if ($filme->image != "capa_padrao.jpg") {
                unlink(public_path('images/' . $filme->image));
            }

            $filme->delete();

            return redirect()->route('list.film')->with('msg', 'Filme deletado!');
        } else {
            $filme->isDeleted = true;
            $filme->update();

            return redirect()->route('list.film')->with('msg', 'Filme deletado!');
        }
    }

    public function createCategory()
    {
        return view('Filme.categoria');
    }

    public function storeCategory(Request $request)
    {
        $categoria = new Categoria();
        $categoria->name = $request->name;

        $categoria->save();

        return redirect('/dashboard')->with('msg', 'Categoria criada com sucesso!');
    }
}
