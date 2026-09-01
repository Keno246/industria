<?php

use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetorApiController;

Route::apiResource('setores', SetorApiController::class)
  ->names('api.setores');