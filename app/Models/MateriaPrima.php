<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'materia_prima';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'codigo',
        'unidade_medida',
        'quantidade_estoque',
        'preco_unitario'
    ];

    protected $casts = [
        'preco_unitario' => 'decimal:2'
    ];
}
