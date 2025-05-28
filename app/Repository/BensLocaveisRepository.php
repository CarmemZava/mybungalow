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
        return Bungalow::with(['marca', 'localizacao'])->findOrFail($id);

    }

    public function buscarPorId_Data_Hospede($id, $dataInicio, $dataFim, $hospedes): bool
    {
        $bungalow = $this->find($id);

        if (!$bungalow) {
            return false;
        }

        if ($bungalow->numero_hospedes < $hospedes) {
            return false;
        }

        $disponibilidade = Locacao::where('bungalow_id', $id)
            ->where(function ($query) use ($dataInicio, $dataFim) {
                $query->whereBetween('start_date', [$dataInicio, $dataFim])
                    ->orWhereBetween('end_date', [$dataInicio, $dataFim])
                    ->orWhere(function ($q) use ($dataInicio, $dataFim) {
                        $q->where('start_date', '<=', $dataInicio)
                            ->where('end_date', '>=', $dataFim);
                    });
            })
            ->count();
        return $disponibilidade === 0;
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
