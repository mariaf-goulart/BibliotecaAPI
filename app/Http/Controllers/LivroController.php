<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        return response()->json(Livro::with
        (['autor', 'categoria'])->get(), 200);
    }

    public function store(Request $request)
    {
        $livro = Livro::create($request->all());
        return response()->json($livro, 200);
    }

    public function show(string $id)
{
    $livro = Livro::with(['autor', 'categoria'])->find($id);
    if($livro){
        return response()->json($livro, 200);
    }
    return response()->json([
        'erro'=>'Registro não encontrado.'], 404);
}

    public function update(Request $request, string $id)
    {
        $livro = Livro::find($id);
        if($livro){
            $livro->update($request->all());
            return response()->json($livro, 200);
        }
        return response()->json(['erro'=>
         'Registro não encontrado'], 404);
    }

    public function destroy(string $id)
    {
        $livro = Livro::find($id);
        if($livro){
            $livro->delete();
            return response()->json($livro, 200);
        }
        return response()->json(['erro'=>
         'Registro não encontrado'], 404);
    }
}