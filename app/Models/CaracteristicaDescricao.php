<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracteristicaDescricao extends Model
{
    protected $table = 'caracteristicas';

    protected $fillable = [
        'nome',
    ];

    public function bungalows()
    {
        return $this->belongsToMany(Bungalow::class, 'bem_caracteristicas', 'caracteristica_id', 'bem_locavel_id');
    }
}
