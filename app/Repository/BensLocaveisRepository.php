<?php

namespace App\Repository;

use App\Models\Bungalow;
use App\Models\Locacao;
use Illuminate\Support\Facades\DB;

class BensLocaveisRepository
{

    public function all()
    {
        return Bungalow::with('marca', 'localizacao')->orderBy('numero_hospedes', 'asc');
    }

    public function buscarPorDisponibilidade($dataInicio, $dataFim, $hospedes)
    {

        return Bungalow::with('marca', 'localizacao')
            ->where('numero_hospedes', '>=', $hospedes)
            ->whereNotExists(function ($query) use ($dataInicio, $dataFim) {
                // Subconsulta para verificar se o imóvel já está reservado no período
                $query->select(DB::raw(1))
                    ->from('locacoes')
                    ->whereColumn('locacoes.bem_locavel_id', 'bens_locaveis.id')
                    ->where('status', 'reservado')
                    ->where(function ($q) use ($dataInicio, $dataFim) {
                        // Verifica a sobreposição das datas
                        $q->where('data_inicio', '<=', $dataFim)
                            ->where('data_fim', '>=', $dataInicio);
                    });
            })
            ->orderBy('numero_hospedes', 'asc');
    }


    public function buscarPorId($id)
    {
        return Bungalow::with(['marca', 'localizacao', 'caracteristicas'])->findOrFail($id);
    }

    public function buscarPorId_Data_Hospede($id, $novoInicio, $novoFim, $novohospedes): bool
    {
        $bungalow = $this->find($id);

        if (!$bungalow) {
            return false;
        }

        if ($bungalow->numero_hospedes < $novohospedes) {
            return false;
        }

        $indisponivel = Locacao::where('bem_locavel_id', $id)
            ->where(function ($query) use ($novoInicio, $novoFim) {
                $query->where('data_inicio', '<=', $novoInicio)
                    ->where('data_fim', '>=', $novoFim);
            })
            ->exists();

        return $indisponivel;
    }




    public function find($id)
    {
        // return Model::findOrFail($id);
    }

    public function create(array $data)
    {
        // return Model::create($data);
    }

    public function update($id, array $data)
    {
        // $model = Model::findOrFail($id);
        // $model->update($data);
        // return $model;
    }

    public function delete($id)
    {
        // return Model::destroy($id);
    }
}
