<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Locacao extends Model
{
    //Criação de Locações fake
    use HasFactory;

    protected $table = 'locacoes';

    protected $fillable = [
        'user_id',
        'bem_locavel_id',
        'data_inicio',
        'data_fim',
        'preco_total',
        'status',
    ];

    //relação de bens_locaveis com locacao
    public function bungalow()
    {
        return $this->belongsTo(Bungalow::class, 'bem_locavel_id');      //a locacao pertence a um bungalow
    }

    //relação de locacao com user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
