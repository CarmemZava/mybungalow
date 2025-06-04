<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    protected $payPalService;


    public function __construct(PayPalService $payPalService)
    {
        $this->payPalService = $payPalService;
    }

    /**
     * Mostra a página de transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('paypal.transaction');
    }

    /**
     * Processa a transação
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        //Valor de total ou inicial -> vem pelo url a partir do transaction
        $amount = $request->query('amount');

        //Guardar este valor na session 'dados-busca-final'
        $dadosFinais = session('dados-busca-final', []);
        $dadosFinais['total'] = $amount;
        session(['dados-busca-final' => $dadosFinais]);

        $response = $this->payPalService->createOrder(
            route('successTransaction', ['amount' => $amount]),
            route('cancelTransaction'),
            $amount
        );

        if (isset($response['id']) && $response['id'] != null) {
            // Redireciona para a URL de aprovação do PayPal
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
            logger()->error('Erro ao processar a transação - Links não encontrados ou formato inesperado', ['response' => $response]);
            return redirect()->route('createTransaction')->with('error', 'Algo deu errado.');
        } else {
            logger()->error('Erro na criação da ordem de pagamento', ['response' => $response]);

            return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Algo deu errado.');
        }
    }
    /**
     * Sucesso da transação.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        //buscar os dados da session para criar a locacao
        $dadosFinais = session('dados-busca-final', []);
        $user_id = Auth::id();
        $bungalow_id = $dadosFinais['bungalow_id'] ?? null;
        $dataInicio = $dadosFinais['data_inicio'] ?? null;
        $dataFim = $dadosFinais['data_fim'] ?? null;
        $precoTotal = $dadosFinais['total'] ?? null;


        $token = $request->input('token');
        // Alternativa a linha 63 seria acessar a query string
        //$token = $request['token'];
        if (!$token) {
            return redirect()->route('cancelTransaction')->with('error', 'Token do PayPal não encontrado.');
        }

        $response = $this->payPalService->capturePaymentOrder($token);

        $name_amount = $this->payPalService->payerNameAndAmout($response);
        $payerName = $name_amount['payerName'] ?? 'Unknown Payer';
        $amount = $name_amount['amount'] ?? 'Unknown Amount';

        // Verifica se o pagamento foi completado
        if ($response['status'] ?? '' === 'COMPLETED') {
            // Redireciona para a rota de finalização com os dados de sucesso
            //Duas alternativas:
            //return redirect()->route('finishTransaction')->with('success', "Pagamento Realizado! Valor: $amount, pago por: $payerName.");

            //Criar a locação
            $locacao = Locacao::create([
                'user_id'     => $user_id,
                'bem_locavel_id' => $bungalow_id,
                'data_inicio' => $dataInicio,
                'data_fim'    => $dataFim,
                'preco_total' => $precoTotal,
                'status' => 'reservado',
            ]);

            $locacao_id = $locacao->id;

            //Guardar o id da locacao na session 'dados-busca-final'
            $dadosFinais = session('dados-busca-final', []);
            $dadosFinais['locacao_id'] = $locacao_id;
            session(['dados-busca-final' => $dadosFinais]);


            return redirect()->route('paypal.finishTransaction', [
                'amount' => $amount,
                'payer' => $payerName,
            ]);
        } else {
            //diferente de withError que usamos no Recaptcha: $message só existe automaticamente dentro de @error().
            //Para mensagens comuns com with(), você acessa com session('chave'); adicionamos uma mensagem simples à sessão, com a chave 'error'
            return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Algo deu errado.');
        }
    }

    /**
     * cancela a transação.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'O utilizador cancelou a operação.');
    }

    public function finishTransaction(Request $request)
    {
        $amount = $request->query('amount');
        $payerName = $request->query('payer');

        return view('paypal.finishTransaction', compact('amount', 'payerName'));
    }
}
