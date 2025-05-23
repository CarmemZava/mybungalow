<?php

namespace App\Http\Controllers;

use App\Models\Bungalow as ModelsBungalow;
use App\Repository\BensLocaveisRepository;
use App\Services\DisponibilidadeService;
use Illuminate\Http\Request;

class BungalowController extends Controller
{
    //Controller "chama" o Service DisponibilidadeService que "chama" o BensLocaveisRepository
    protected $disponibilidadeService;

    public function __construct(DisponibilidadeService $disponibilidadeService)
    {
        $this->disponibilidadeService=$disponibilidadeService;
    }

    public function all_avalible(Request $request)
    {
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');

        $hospedes = (int) $request->input('hospedes');

        $query = $this->disponibilidadeService->obterDisponiveis($dataInicio, $dataFim, $hospedes);
        $bungalows = $query->paginate(10);

        return view('bungalow.find', compact('bungalows'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
