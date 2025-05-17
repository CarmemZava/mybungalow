<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Bungalow\Models\Bungalow;

class Marca extends Model
{
    //sem o protected o laravel considera que a tabela no mysql chama "marcas"
    protected $table = 'marca';

    protected $fillable = [
    'tipo_bem_id',
    'nome',
    'observacao',
    ];

    //relacao marca com bens_locaveis (Bungalow)
    //bungalows no plural: uma marca tem muitos bungalows
    public function bungalows(){
        return $this->hasMany(Bungalow::class,'marca_id');    //1 marca tem muitos bungalows
        }
}
