<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    protected $table = 'manutencoes';

    protected $fillable = [
        'equipamento_id',
        'funcionario_id',
        'tipo',
        'descricao',
        'data_manutencao',
        'proxima_manutencao',
        'custo',
        'status'
    ];

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}