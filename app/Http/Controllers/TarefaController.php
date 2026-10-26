<?php

namespace App\Http\Controllers;
use App\Models\Tarefa;
use App\Models\Usuario;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefasAFazer = Tarefa::where('status','A Fazer')->get();
        $tarefasFazendo = Tarefa::where('status','Fazendo')->get();
        $tarefasPronto = Tarefa::where('status','Pronto')->get();
        return view('tarefas.index',compact('tarefasAFazer','tarefasFazendo','tarefasPronto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $usuarios = Usuario::all();
         return view('tarefas.create',compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Tarefa::create([
            'descricao' => $request->descricao,
            'setor' => $request->setor,
            'prioridade' => $request->prioridade,
            'usuario_id' => $request->usuario_id,
            'status' => $request->status
        ]);

        $usuarios = Usuario::all();

        return view('tarefas.create',compact('usuarios'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->destroy($id);
        $tarefasAFazer = Tarefa::where('status','A Fazer')->get();
        $tarefasFazendo = Tarefa::where('status','Fazendo')->get();
        $tarefasPronto = Tarefa::where('status','Pronto')->get();
        return view('tarefas.index',compact('tarefasAFazer','tarefasFazendo','tarefasPronto'));

    }

   public function alterarstatus(Request $request, string $id)
{
    $tarefa = Tarefa::find($id);

    $tarefa->status = $request->status;

    $tarefa->save();

    $tarefasAFazer = Tarefa::where('status', 'A Fazer')->get();
    $tarefasFazendo = Tarefa::where('status', 'Fazendo')->get();
    $tarefasPronto = Tarefa::where('status', 'Pronto')->get();

    return view('tarefas.index', compact(
        'tarefasAFazer',
        'tarefasFazendo',
        'tarefasPronto'
    ));
}


}