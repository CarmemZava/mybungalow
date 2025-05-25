<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoDatas;
use App\Models\Bungalow;
use App\Repository\BensLocaveisRepository;
use App\Services\DisponibilidadeService;
use Illuminate\Http\Request;

class BungalowController extends Controller
{
    //Controller "chama" o Service DisponibilidadeService que "chama" o BensLocaveisRepository
    protected $disponibilidadeService;

    public function __construct(DisponibilidadeService $disponibilidadeService)
    {
        $this->disponibilidadeService = $disponibilidadeService;
    }

    public function index()
    {
        $bungalows = Bungalow::paginate(8);

        return view('bungalow.find', [
            'bungalows' => $bungalows,
            'dataInicio' => null,
            'dataFim' => null,
            'hospedes' => null,
        ]);
    }

    public function all_avalible(ValidacaoDatas $request)
    {
        //dataInicio, dataFim e hospedes já validados pelo ValidacaoDatas
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');

        $hospedes = (int) $request->input('hospedes');

        $query = $this->disponibilidadeService->obterDisponiveis($dataInicio, $dataFim, $hospedes);
        $bungalows = $query->paginate(8);

        return view('bungalow.find', [
            'bungalows' => $bungalows,
            'dataInicio' => $dataInicio,
            'dataFim' => $dataFim,
            'hospedes' => $hospedes,
        ]);
    }

    public function show_more($id, Request $request)
    {
        $dataInicio = $request->query('data_inicio');
        $dataFim = $request->query('data_fim');
        $hospedes = $request->query('hospedes');


        $bungalow = $this->disponibilidadeService->obterEspecifico($id);
        return view(
            'bungalow.show',
            [
                'bungalow' => $bungalow,
                'dataInicio' => $dataInicio,
                'dataFim' => $dataFim,
                'hospedes' => $hospedes
            ]
        );
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
