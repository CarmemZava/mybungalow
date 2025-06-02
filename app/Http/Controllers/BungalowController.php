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

        session(['dados-busca-inicial' => [
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'hospedes' => $hospedes,
        ]]);

        $query = $this->disponibilidadeService->obterDisponiveis($dataInicio, $dataFim, $hospedes);
        $bungalows = $query->paginate(8);

        return view('bungalow.find', [
            'bungalows' => $bungalows,
        ]);
    }

    public function show_more($id)
    {
        //buscar dados da session
        $dadosBusca = session('dados-busca-inicial', []);
        $dataInicio = $dadosBusca['data_inicio'] ?? null;
        $dataFim = $dadosBusca['data_fim'] ?? null;
        $hospedes = $dadosBusca['hospedes'] ?? null;

        //Cálculo Preço 10% e total
        $bungalow = Bungalow::findOrFail($id);
        $preco_diario = $bungalow->preco_diario;
        $dias = (new \DateTime($dataInicio))->diff(new \DateTime($dataFim))->days;
        $valorTotal = $dias * $preco_diario;
        $valorInicial = $valorTotal * 0.1;

        // Adiciona os novos valores a session dados-busca-inicial e altera para novo nome
        $dadosAtualizados = array_merge($dadosBusca, [
            'bungalow_id' => $bungalow->id,
            'total' => $valorTotal,
            'inicial' => $valorInicial,
        ]);

        session()->forget('dados-busca-inicial');

        // A variável com a session atualizada agora chama $dadosAtualizados
        session(['dados-busca-final' => $dadosAtualizados]);

        return view(
            'bungalow.show',
            [
                'bungalow' => $bungalow,
                'dados-busca-final' => $dadosAtualizados,
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
