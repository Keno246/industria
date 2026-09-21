<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefa';

    protected $fillable = ['descricao','usuario_id','nome_setor','prioridade','data_cadastro','status'
    ];

    public $timestamps = false;
}