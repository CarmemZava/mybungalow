<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas extends Model
{
    protected $table = 'bem_caracteristicas';

    protected $fillable = [
    'bem_locavel_id',
    'caracteristica_id',
    ];


   
}
