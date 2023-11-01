<?php

namespace App\Http\Controllers\Filme;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaStore;
use App\Http\Requests\FilmeStore;
use App\Models\Categoria;
use App\Models\Filme;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class FilmeController extends Controller
{
    public function index()
    {
        $search = request('search');
        $searchCategory = request('categoria');

        if ($search) {
            $filmes = Filme::where([
                ['title', 'like', '%' . $search . '%']
            ])->where('isDeleted', '=', null)->where('amount', '>', 0)->get();
            if (count($filmes) == 0) {
                $categoria = Categoria::where([[
                    'name', 'like', '%' . $search . '%'
                ]])->first();

                if ($categoria) {
                    $filmes = Filme::where([[
                        'categoria', '=', $categoria->id
                    ]])->where('isDeleted', '=', null)->where('amount', '>', 0)->get();
                }
            }
        } else {
            $filmes = Filme::where('isDeleted', '=', null)->where('amount', '>', 0)->get();
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
        if (auth()->user()->tipo_conta == 'admin') {
            $categorias = Categoria::all();
            if (count($categorias) > 0) {
                return view('Filme.cadastro', compact('categorias'));
            } else {
                return redirect('/cadastrar_categoria')->with('msg', 'Antes de adicionar um filme, preciso que adicione uma categoria!');
            }

        } else return redirect('/');
    }

    public function store(FilmeStore $request)
    {
        if (auth()->user()->tipo_conta == 'admin') {
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
        } else return redirect('/');
    }

    public function show(string $id)
    {
        $filme = Filme::findOrFail($id);

        return view('Filme.Show', ['filme' => $filme]);
    }

    public function edit(string $id)
    {
        if (auth()->user()->tipo_conta == 'admin') {
            $filme = Filme::findOrFail($id);
            $categorias = Categoria::all();
            return view('Filme.Edit', compact('filme', 'categorias'));
        } else return redirect('/');
    }

    public function update(string $id, FilmeStore $request)
    {
        if (auth()->user()->tipo_conta == 'admin') {
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
        } else return redirect('/');
    }

    public function destroy(string $id)
    {
        if (auth()->user()->tipo_conta == 'admin') {

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

                return redirect()->route('list.film')->with('msg', 'Filme aguarda confirmação para ser permanentemente deletado!');
            }
        } else return redirect('/');
    }

    public function createCategory()
    {
        if (auth()->user()->tipo_conta == 'admin') {
            return view('Filme.categoria');
        } else return redirect('/');
    }

    public function storeCategory(CategoriaStore $request)
    {
        if (auth()->user()->tipo_conta == 'admin') {

            $categoria = new Categoria();
            $categoria->name = $request->name;

            $categoria->save();

            return redirect('/dashboard')->with('msg', 'Categoria criada com sucesso!');
        } else return redirect('/');
    }
}
