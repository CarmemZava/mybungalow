<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacoes extends Model
{
    protected $table = 'locacoes';

    protected $fillable = [
    'user_id',
    'bem_locavel_id',
    'data_inicio',
    'data_fim',
    'preco_total',
    'status',
    ];
}
