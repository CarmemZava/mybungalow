<?php

namespace App\Models;

use App\Models\Localizacao;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;

class Bungalow extends Model
{
    //protected $table para especificar a tabela que será utilizada no Model
    protected $table = 'bens_locaveis';

    protected $fillable = [
        'marca_id',
        'modelo',
        'numero_quartos',
        'numero_hospede',
        'preco_diario',
    ];

    //Criar relacoes --> pergunta ANA, posso incluir aqui a relacao com outras datbase simples

    //relação bens_locaveis com marca
    //marca no singular: cada bungalow pertence a uma única marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');      //muitos bungalows para 1 marca
    }

    //relação bens_locaveis com localizacao
    public function localizacao()
    {
        return $this->hasOne(Localizacao::class, 'bem_locavel_id');              //1 bungalow tem 1 localizacao
    }

    //relação caracteristicaDescricao/Bungalows com caracteristicas
    public function caracteristicas()
    {
        return $this->belongsToMany(CaracteristicaDescricao::class, 'bem_caracteristicas', 'bem_locavel_id', 'caracteristica_id');
    }
}
