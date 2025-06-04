<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DownloadPDF extends Controller
{
    public function downloadArquivoPdf()
    {
        //locacao_id foi guardado no 'dados-busca-final'
        $dadosFinais = session('dados-busca-final');
        if (!isset($dadosFinais['locacao_id'])) {
            return redirect()->route('dashboard');
        }

        $locacao_id = $dadosFinais['locacao_id'];

        $locacao = Locacao::with(['user', 'bungalow'])->find($locacao_id);

        if (!$locacao) {
            return redirect()->route('dashboard')->with('error', 'Locação não encontrada.');
        }

        $pdf = Pdf::loadView('locacao.print', compact('locacao'));

        return $pdf->download('locacao-' . env('APP_NAME') . '-' . date('Ymd') . '.pdf');
    }

    
}
