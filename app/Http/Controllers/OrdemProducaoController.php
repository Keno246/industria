<?php

namespace App\Http\Controllers;

use App\Models\OrdemProducao;
use App\Models\Setor;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class OrdemProducaoController extends Controller
{
    public function index()
    {
        $ordens = OrdemProducao::all();

        return view('ordens_producao.index', compact('ordens'));
    }

    public function create()
    {
        $setores = Setor::all();
        $funcionarios = Funcionario::all();

        return view('ordens_producao.create', compact(
            'setores',
            'funcionarios'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'setor_id' => 'required|exists:setores,id',
            'responsavel_id' => 'required|exists:funcionarios,id',
            'codigo_ordem' => 'required|max:30|unique:ordens_producao,codigo_ordem',
            'produto' => 'required|max:100',
            'quantidade_planejada' => 'required|integer|min:1',
            'quantidade_produzida' => 'required|integer|min:0',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
            'status' => 'required|max:20',
            'observacoes' => 'nullable'
        ]);

        OrdemProducao::create([
            'setor_id' => $request->setor_id,
            'responsavel_id' => $request->responsavel_id,
            'codigo_ordem' => $request->codigo_ordem,
            'produto' => $request->produto,
            'quantidade_planejada' => $request->quantidade_planejada,
            'quantidade_produzida' => $request->quantidade_produzida,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'status' => $request->status,
            'observacoes' => $request->observacoes
        ]);

        return redirect()
            ->route('ordens_producao.index')
            ->with('success', 'Ordem de produção cadastrada com sucesso!');
    }

    public function show(OrdemProducao $ordemProducao)
    {
        return view(
            'ordens_producao.show',
            compact('ordemProducao')
        );
    }

    public function edit(OrdemProducao $ordemProducao)
    {
        $setores = Setor::all();
        $funcionarios = Funcionario::all();

        return view(
            'ordens_producao.edit',
            compact(
                'ordemProducao',
                'setores',
                'funcionarios'
            )
        );
    }

    public function update(
        Request $request,
        OrdemProducao $ordemProducao
    ) {
        $request->validate([
            'setor_id' => 'required|exists:setores,id',
            'responsavel_id' => 'required|exists:funcionarios,id',
            'codigo_ordem' => 'required|max:30|unique:ordens_producao,codigo_ordem,' . $ordemProducao->id,
            'produto' => 'required|max:100',
            'quantidade_planejada' => 'required|integer|min:1',
            'quantidade_produzida' => 'required|integer|min:0',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
            'status' => 'required|max:20',
            'observacoes' => 'nullable'
        ]);

        $ordemProducao->update([
            'setor_id' => $request->setor_id,
            'responsavel_id' => $request->responsavel_id,
            'codigo_ordem' => $request->codigo_ordem,
            'produto' => $request->produto,
            'quantidade_planejada' => $request->quantidade_planejada,
            'quantidade_produzida' => $request->quantidade_produzida,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'status' => $request->status,
            'observacoes' => $request->observacoes
        ]);

        return redirect()
            ->route('ordens_producao.index')
            ->with('success', 'Ordem de produção atualizada com sucesso!');
    }

    public function destroy(OrdemProducao $ordemProducao)
    {
        $ordemProducao->delete();

        return redirect()
            ->route('ordens_producao.index')
            ->with('success', 'Ordem de produção excluída com sucesso!');
    }
}