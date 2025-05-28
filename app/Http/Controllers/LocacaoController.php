<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoDatas;
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

    //método de pré-reserva, ao confirmar as datas,guests no modal, faz uma pré-locacao se o bungalow estiver disponível de acordo com os inputs
    public function pre_reservation(ValidacaoDatas $request)
    {
        //Recebe os dados para passar para a ValidacaoDatas
        $id = $request->input('bungalow_id');
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');
        $hospedes = (int) $request->input('hospedes');


        //Recebe os valores que vem escondidos no modal
        $valorTotal = $request->input('valor_total');
        $valorInicial = $request->input('valor_inicial');


        if (!$this->disponibilidadeService->obterDisponiveis($id, $dataInicio, $dataFim, $hospedes)) {
            return response()->json(['message' => 'Bungalow indisponível nas datas informadas.'], 422);
        }


        //retorna para a view transaction(paypal) onde vai acontecer o pagamento e assim confirmar ou não a realização da reserva
        return view('locacao.transaction', [
            'valor_total'=> $valorTotal,
            'valor_inicial'=> $valorInicial,
        ]);



        /* Esta estapa vai acontecer no pagamento

        $reserva = Locacao::create(
            'bungalow_id',
            'data_inicio',
            'data_fim',
            'hospedes',

        );
*/
    }


    public function index()
    {
        //PRECISO DE CRIAR AS RELAÇÕES ENTRE OS USERS E LOCACOES, NA VIEW TESTE EU FAÇO UM FORM GET, TALVEZ ESSA INFO TENHA QUEM FICAR NO SHOW E NAO NO INDEX COMO ESTÁ
        //$locacoes=Locacao::all();

        //return view('bungalow.teste', compact('locacoes'));
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
