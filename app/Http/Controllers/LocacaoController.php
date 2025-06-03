<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoDatas;
use App\Models\Bungalow;
use App\Models\Locacao;
use App\Services\DisponibilidadeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LocacaoController extends Controller
{
    protected $disponibilidadeService;

    public function __construct(DisponibilidadeService $disponibilidadeService)
    {
        $this->disponibilidadeService = $disponibilidadeService;
    }

    // método para mostrar todas as locações do user
    public function show_user_bookings()
    {
        $user_id = Auth::id();

        $locacoes = Locacao::with('bungalow.localizacao')
            ->where('user_id', $user_id)
            ->get();

        return view('locacao.user-bookings', ['locacoes' => $locacoes]);
    }

    //método de pré-reserva, novas datas incluídas no modal, antes da pagina de pagamento
    public function recalcularReserva(ValidacaoDatas $request)
    {
        //novas datas para validação/calculos
        $novoInicio = $request->input('data_inicio');
        $novoFim = $request->input('data_fim');
        $novohospedes = (int) $request->input('hospedes');

        //buscar bungalow/id pelo session
        $dadosAtualizados = session('dados-busca-final');
        $id = $dadosAtualizados['bungalow_id'];


        //nova validação de disponibilidade -> se não disponível, volta para a página e manda mensagem de erro
        $indisponivel = $this->disponibilidadeService->verificacaoFinalDataHospede($id, $novoInicio, $novoFim, $novohospedes);


        //Erro caso não tenha disponibilidade
        if ($indisponivel) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['indisponibilidade' => 'Sorry, these dates are already booked.']);
        }

        //novos cálculos de pagamento
        $bungalow = Bungalow::findOrFail($id);
        $preco_diario = $bungalow->preco_diario;
        $dias = (new \DateTime($novoInicio))->diff(new \DateTime($novoFim))->days;
        $novoTotal = $dias * $preco_diario;
        $novoInicial = $novoTotal * 0.1;


        //nova session com os dados finais
        $dadosFinais = [
            'bungalow_id' => $id,
            'data_inicio' => $novoInicio,
            'data_fim' => $novoFim,
            'hospedes' => $novohospedes,
            'total' => $novoTotal,
            'inicial' => $novoInicial,
        ];
        session(['dados-busca-final' => $dadosFinais]);

        return view(
            'paypal.transaction',
            [
                'dados-busca-final' => $dadosFinais
            ]
        );
    }


    public function index()
    {
        //
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
        return view('bungalow-locacao.transaction');
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
