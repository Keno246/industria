<?php

namespace App\Http\Controllers;
use App\Models\Usuario;


use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::query();
        if($request->filled('id')){
            $usuarios = Usuario::where('id',$request->id)->get();
        }
        if($request->filled('nome')){
            $usuarios = Usuario::where('nome','like','%'.$request->nome.'%');
        }
        if($request->filled('email')){
            $usuarios = Usuario::where('email',$request->email);
        }
            $usuarios = $usuarios->get();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
   return view('usuarios.create');
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email
        ]);
        return view('usuarios.create');

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
        //
    }
}
