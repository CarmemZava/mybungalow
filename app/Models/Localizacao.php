<?php

namespace App\Models;

use App\Domain\Bungalow\Models\Bungalow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Localizacao extends Model
{
    protected $table = 'localizacoes';

    protected $fillable = [
    'bem_locavel_id',
    'cidade',
    'filial',
    'posicao',
    ];

    //relacao localizacoes com os bens_locaveis(Bungalow)
    public function bungalow() {
        return $this->HasOne(Bungalow::class,'bem_locavel_id');        //1 bungalow para 1 localizao
        }
}
