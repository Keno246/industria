<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Setor;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $equipamentos = Equipamento::all();

    return view('equipamentos.index', compact('equipamentos'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $setores = Setor::all();

    return view('equipamentos.create', compact('setores'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'patrimonio' => 'required|unique:equipamentos,patrimonio',
        'setor_id' => 'nullable',
        'status' => 'nullable'
    ]);

    Equipamento::create(
        $request->only('nome', 'patrimonio', 'setor_id', 'status')
    );

    return redirect()->route('equipamentos.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipamento $equipamento)
{
    $setores = Setor::all();

    return view(
        'equipamentos.edit',
        compact('equipamento', 'setores')
    );
}
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Equipamento $equipamento)
{
    $request->validate([
        'nome' => 'required',
        'patrimonio' => 'required|unique:equipamentos,patrimonio,' . $equipamento->id,
        'setor_id' => 'nullable',
        'status' => 'nullable'
    ]);

    $equipamento->update(
        $request->only('nome', 'patrimonio', 'setor_id', 'status')
    );

    return redirect()->route('equipamentos.index');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Equipamento $equipamento)
{
    $equipamento->delete();

    return redirect()->route('equipamentos.index');
}
}