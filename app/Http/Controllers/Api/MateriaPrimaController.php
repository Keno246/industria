<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        return response()->json(MateriaPrima::all(), 200);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:100',
            'codigo' => 'required|string|max:20|unique:materia_prima,codigo',
            'unidade_medida' => 'required|string|max:10',
            'quantidade_estoque' => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0'
        ]);

        $materiaPrima = MateriaPrima::create($dados);

        return response()->json($materiaPrima, 201);
    }

    
    public function show(MateriaPrima $materiaPrima)
    {
        return response()->json($materiaPrima, 200);
    }

    public function update(Request $request, MateriaPrima $materiaPrima)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:100',
            'codigo' => 'required|string|max:20|unique:materia_prima,codigo,' . $materiaPrima->id,
            'unidade_medida' => 'required|string|max:10',
            'quantidade_estoque' => 'required|integer|min:0',
            'preco_unitario' => 'required|numeric|min:0'
        ]);

        $materiaPrima->update($dados);

        return response()->json($materiaPrima, 200);
    }

    public function destroy(MateriaPrima $materiaPrima)
    {
        $materiaPrima->delete();

        return response()->noContent();
    }

}
