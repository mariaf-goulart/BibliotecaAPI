<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return response()->json(Autor::all(), 200);
    }

    public function store(Request $request)
    {
        $autor = Autor::create($request->all());
        return response()->json($autor, 201);
    }

    public function show(string $id)
    {
        $autor = Autor::find($id);
        if($autor){
            return response()->json($autor, 200);
        }
        return response()->json(['erro'=>
         'Registro não encontrado.'], 404);
    }

    public function update(Request $request, string $id)
    {
        $autor = Autor::find($id);
        if($autor){
            $autor->update($request->all());
            return response()->json($autor, 200);
        }
        return response()->json(['erro'=>
         'Registro não encontrado'], 404);
    }

    public function destroy(string $id)
    {
        $autor = Autor::find($id);
        if($autor){
            $autor->delete();
            return response()->json($autor, 200);
        }
        return response()->json(['erro'=>
         'Registro não encontrado'], 404);
    }
}

