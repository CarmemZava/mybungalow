<?php

namespace App\Services;

use App\Repository\BensLocaveisRepository;

class DisponibilidadeService
{
    //Service foi criado para manter a organização do sistema pipeline:
    //Controller -> Service -> Repository
    protected $repositorio;

    public function __construct(BensLocaveisRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function obterDisponiveis($dataInicio, $dataFim, $hospedes){

        //Caso falte algum dos parâmetros, buscar o método all() no repositorio
        if(!$dataInicio || !$dataFim || !$hospedes){

            return $this->repositorio->all();
        }
        //Caso todos os parâmetros preenchidos, buscar o método buscarPorDisponibilidade e passar estes parâmetros
        return $this->repositorio->buscarPorDisponibilidade($dataInicio, $dataFim, $hospedes);
    }

    public function obterEspecifico($id){
        return $this->repositorio->buscarPorId($id);
    }
}
