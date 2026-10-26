<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('setores', SetorController::class);
    Route::patch('/setores/{id}/status',[SetorController::class,'ativarDesativar'])->name('setores.ativar-desativar');
    Route::resource('usuario', UsuarioController::class);
    Route::resource('tarefa', TarefaController::class);
    Route::put('/tarefa/alterarstatus/{id}', [TarefaController::class, 'alterarstatus'])->name('tarefa.alterarstatus');
});


require __DIR__.'/auth.php';