<?php

namespace App\Http\Controllers;

use App\Mail\BookingDetailsMail;
use App\Models\Locacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendBookingMailController extends Controller
{
    public function sendReservationEmail()
    {
        //buscar o user para qual o mail será enviado
        $user = Auth::user();

        //recuperar o nome e o email do utilizador logado
        $clientName = $user->name;
        $email = $user->email;

        //buscar outros dados pela session que serão necessários no email
        $dadosFinais = session('dados-busca-final', []);
        $locacao_id = $dadosFinais['locacao_id'] ?? null;

        //erro caso não encontre o locacao_id
        if (!$locacao_id) {
            return back()->with('error', 'Não foi possível enviar o e-mail. ID da locação em falta.');
        }

        $locacao = Locacao::findOrFail($locacao_id);

        //enviar o email
        Mail::to($email)
            ->send(new BookingDetailsMail($locacao, $email, $clientName));

        //retorna a página anterior (back) com a mensagem
        return back()->with('success', 'Email sent successfully!!');
    }
}
