<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorApiController;
use App\Http\Controllers\Api\FabricaController;
use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\MateriaPrimaController;


Route::apiResource('setores', SetorApiController::class)
  ->names('api.setores');

  Route::apiResource('fabrica', FabricaController::class);

  Route::apiResource('fornecedores', FornecedorController::class);

  Route::apiResource('materias-primas', MateriaPrimaController::class)
    ->parameters(['materias-primas' => 'materiaPrima']);
