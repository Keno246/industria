<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\fabrica;
use Illuminate\Http\Request;

class FabricaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return fabrica::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fabrica = Fabrica::create($request->all());
        return response()->json($fabrica,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(fabrica $fabrica)
    {
        return $fabrica;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fabrica $fabrica)
    {
        $fabrica->update($request->all());
        return $fabrica;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fabrica $fabrica)
    {
        return response()->json("Registro excluído com sucesso");
    }
}
