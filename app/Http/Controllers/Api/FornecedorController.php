<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::orderBy('razao_social')->get();

        return response()->json($fornecedores, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
    'razao_social' => 'required|string|max:150',
    'cnpj' => 'required|digits:14|unique:fornecedores,cnpj',
    'observacoes' => 'nullable|string',
    'prazo_entrega' => 'required|integer|min:1',
    'limite_credito' => 'required|numeric|min:0',
    'data_contrato' => 'nullable|date',
    'ativo' => 'required|boolean'
]);
        $fornecedor = Fornecedor::create($request->all());

        return response()->json($fornecedor, 201);
    }

    public function show(Fornecedor $fornecedor)
{
    return response()->json($fornecedor, 200);
}

    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::find($id);

        if (!$fornecedor) {
            return response()->json([
                'mensagem' => 'Fornecedor não encontrado'
            ], 404);
        }

        $request->validate([
            'razao_social' => 'required|string|max:150',
            'cnpj' => 'required|digits:14|unique:fornecedores,cnpj,' . $id,
            'observacoes' => 'nullable|string',
            'prazo_entrega' => 'required|integer|min:1',
            'limite_credito' => 'required|numeric|min:0',
            'data_contrato' => 'nullable|date',
            'ativo' => 'required|boolean'
        ]);

        $fornecedor->update($request->all());

        return response()->json($fornecedor, 200);
    }

    public function destroy(Fornecedor $fornecedor)
{
    $fornecedor->delete();

    return response()->noContent();
}
}
