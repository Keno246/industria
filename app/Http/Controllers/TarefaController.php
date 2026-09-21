<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Usuario;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::leftJoin('usuarios', 'tarefa.usuario_id', '=', 'usuarios.id')
            ->select('tarefa.*', 'usuarios.nome as usuario_nome')
            ->get();

        $aFazer = $tarefas->where('status', 'A Fazer');
        $fazendo = $tarefas->where('status', 'Fazendo');
        $pronto = $tarefas->where('status', 'Pronto');

        return view('tarefa.index', compact('aFazer', 'fazendo', 'pronto'));
    }

    public function create()
    {
        $usuarios = Usuario::all();

        return view('tarefa.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'nome_setor' => 'required',
            'prioridade' => 'required|in:Alta,Média,Baixa',
            'data_cadastro' => 'required',
            'status' => 'required|in:A Fazer,Fazendo,Pronto'
        ]);

        Tarefa::create([
            'descricao' => $request->descricao,
            'usuario_id' => $request->usuario_id,
            'nome_setor' => $request->nome_setor,
            'prioridade' => $request->prioridade,
            'data_cadastro' => $request->data_cadastro,
            'status' => $request->status
        ]);

        return redirect()->route('tarefa.index');
    }

    public function edit(string $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $usuarios = Usuario::all();

        return view('tarefa.create', compact('tarefa', 'usuarios'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'descricao' => 'required',
            'usuario_id' => 'required|exists:usuarios,id',
            'nome_setor' => 'required',
            'prioridade' => 'required|in:Alta,Média,Baixa',
            'data_cadastro' => 'required',
            'status' => 'required|in:A Fazer,Fazendo,Pronto'
        ]);

        $tarefa = Tarefa::findOrFail($id);

        $tarefa->update([
            'descricao' => $request->descricao,
            'usuario_id' => $request->usuario_id,
            'nome_setor' => $request->nome_setor,
            'prioridade' => $request->prioridade,
            'data_cadastro' => $request->data_cadastro,
            'status' => $request->status
        ]);

        return redirect()->route('tarefa.index');
    }

    public function alterarStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:A Fazer,Fazendo,Pronto'
        ]);

        $tarefa = Tarefa::findOrFail($id);

        $tarefa->update([
            'status' => $request->status
        ]);

        return redirect()->route('tarefa.index');
    }

    public function destroy(string $id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $tarefa->delete();

        return redirect()->route('tarefa.index');
    }

    public function show(string $id)
    {
        //
    }
}