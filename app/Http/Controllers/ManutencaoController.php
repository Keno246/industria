<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use App\Models\Equipamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function index()
    {
        $manutencoes = Manutencao::with([
            'equipamento',
            'funcionario'
        ])->get();

        return view(
            'manutencoes.index',
            compact('manutencoes')
        );
    }

    public function create()
    {
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();

        return view(
            'manutencoes.create',
            compact(
                'equipamentos',
                'funcionarios'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipamento_id' => 'required|exists:equipamentos,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'tipo' => 'required|max:50',
            'descricao' => 'nullable',
            'data_manutencao' => 'nullable|date',
            'proxima_manutencao' => 'nullable|date',
            'custo' => 'nullable|numeric',
            'status' => 'required|max:20'
        ]);

        Manutencao::create([
            'equipamento_id' => $request->equipamento_id,
            'funcionario_id' => $request->funcionario_id,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'data_manutencao' => $request->data_manutencao,
            'proxima_manutencao' => $request->proxima_manutencao,
            'custo' => $request->custo,
            'status' => $request->status
        ]);

        return redirect()
            ->route('manutencoes.index')
            ->with('success', 'Manutenção cadastrada com sucesso!');
    }

    public function show(Manutencao $manutencao)
    {
        return view(
            'manutencoes.show',
            compact('manutencao')
        );
    }

    public function edit(Manutencao $manutencao)
    {
        $equipamentos = Equipamento::all();
        $funcionarios = Funcionario::all();

        return view(
            'manutencoes.edit',
            compact(
                'manutencao',
                'equipamentos',
                'funcionarios'
            )
        );
    }

    public function update(
        Request $request,
        Manutencao $manutencao
    ) {
        $request->validate([
            'equipamento_id' => 'required|exists:equipamentos,id',
            'funcionario_id' => 'required|exists:funcionarios,id',
            'tipo' => 'required|max:50',
            'descricao' => 'nullable',
            'data_manutencao' => 'nullable|date',
            'proxima_manutencao' => 'nullable|date',
            'custo' => 'nullable|numeric',
            'status' => 'required|max:20'
        ]);

        $manutencao->update([
            'equipamento_id' => $request->equipamento_id,
            'funcionario_id' => $request->funcionario_id,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'data_manutencao' => $request->data_manutencao,
            'proxima_manutencao' => $request->proxima_manutencao,
            'custo' => $request->custo,
            'status' => $request->status
        ]);

        return redirect()
            ->route('manutencoes.index')
            ->with('success', 'Manutenção atualizada com sucesso!');
    }

    public function destroy(Manutencao $manutencao)
    {
        $manutencao->delete();

        return redirect()
            ->route('manutencoes.index')
            ->with('success', 'Manutenção excluída com sucesso!');
    }
}