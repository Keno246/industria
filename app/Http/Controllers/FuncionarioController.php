<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Setor;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $funcionarios = Funcionario::where('id', '>', 0);

    if ($request->filled('nome')) {
        $funcionarios = $funcionarios->where(
            'nome',
            'like',
            '%' . $request->nome . '%'
        );
    }

    if ($request->filled('cargo')) {
        $funcionarios = $funcionarios->where(
            'cargo',
            'like',
            '%' . $request->cargo . '%'
        );
    }

    if ($request->filled('setor_id')) {
        $funcionarios = $funcionarios->where(
            'setor_id',
            $request->setor_id
        );
    }

    if ($request->filled('matricula')) {
        $funcionarios = $funcionarios->where(
            'matricula',
            'like',
            '%' . $request->matricula . '%'
        );
    }

    $setorSelecionado = $request->filled('setor_id')
        ? Setor::find($request->setor_id)
        : null;

    $funcionarios = $funcionarios->get();

    $setores = Setor::all();

    return view('funcionarios.index', compact(
        'funcionarios',
        'setores',
        'setorSelecionado'
    ));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $setores = Setor::all();

    return view('funcionarios.create', compact('setores'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'matricula' => 'required|unique:funcionarios,matricula',
        'cargo' => 'required',
        'setor_id' => 'required'
    ]);

    Funcionario::create(
        $request->only('nome', 'matricula', 'cargo', 'setor_id')
    );

    return redirect()->route('funcionarios.index');
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
   public function edit(Funcionario $funcionario)
    {
        $setores = Setor::all();

        return view('funcionarios.edit', compact('funcionario', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
{
    $request->validate([
        'nome' => 'required',
        'matricula' => 'required|unique:funcionarios,matricula,' . $funcionario->id,
        'cargo' => 'required',
        'setor_id' => 'required'
    ]);

    $funcionario->update([
        'nome' => $request->nome,
        'matricula' => $request->matricula,
        'cargo' => $request->cargo,
        'setor_id' => $request->setor_id
    ]);

    return redirect()->route('funcionarios.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
{
    $funcionario->delete();

    return redirect()->route('funcionarios.index');
}
}
