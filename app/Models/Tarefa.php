<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Tarefa extends Model
{
    protected $table = 'tarefa';
    protected $fillable = ['descricao' ,'setor','prioridade','usuario_id','status'];

    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}