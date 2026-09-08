<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Setor;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index(Request $request)
    {
        $equipamentos = Equipamento::where('id', '>', 0);

        if ($request->filled('nome')) {
            $equipamentos = $equipamentos->where(
                'nome',
                'like',
                '%' . $request->nome . '%'
            );
        }

        if ($request->filled('status')) {
            $equipamentos = $equipamentos->where(
                'status',
                $request->status
            );
        }

        if ($request->filled('setor_id')) {
            $equipamentos = $equipamentos->where(
                'setor_id',
                $request->setor_id
            );
        }

        if ($request->filled('patrimonio')) {
            $equipamentos = $equipamentos->where(
                'patrimonio',
                'like',
                '%' . $request->patrimonio . '%'
            );
        }

        $setorSelecionado = $request->filled('setor_id')
            ? Setor::find($request->setor_id)
            : null;

        $equipamentos = $equipamentos->get();

        $setores = Setor::all();

        return view('equipamentos.index', compact(
            'equipamentos',
            'setores',
            'setorSelecionado'
        ));
    }

    public function create()
    {
        $setores = Setor::all();

        return view('equipamentos.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:150',
            'patrimonio' => 'required|max:30|unique:equipamentos,patrimonio',
            'setor_id' => 'nullable|exists:setores,id',
            'status' => 'nullable|max:20'
        ]);

        Equipamento::create([
            'nome' => $request->nome,
            'patrimonio' => $request->patrimonio,
            'setor_id' => $request->setor_id,
            'status' => $request->status ?? 'ativo'
        ]);

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function show(Equipamento $equipamento)
    {
        return view('equipamentos.show', compact('equipamento'));
    }

    public function edit(Equipamento $equipamento)
    {
        $setores = Setor::all();

        return view('equipamentos.edit', compact(
            'equipamento',
            'setores'
        ));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $request->validate([
            'nome' => 'required|max:150',
            'patrimonio' => 'required|max:30|unique:equipamentos,patrimonio,' . $equipamento->id,
            'setor_id' => 'nullable|exists:setores,id',
            'status' => 'nullable|max:20'
        ]);

        $equipamento->update([
            'nome' => $request->nome,
            'patrimonio' => $request->patrimonio,
            'setor_id' => $request->setor_id,
            'status' => $request->status ?? 'ativo'
        ]);

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento excluído com sucesso!');
    }
}