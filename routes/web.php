<?php

use App\Http\Controllers\BungalowController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProfileController;
use App\Models\Locacao;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('bungalow.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    ////################ Rotas bungalows acessíveis apenas com Login/Registro:
    //Rota busca de Bungalows
    Route::get('/bungalows', [BungalowController::class, 'index'])->name('bungalow.index');
    //Rota busca de Bungalows com preenchimento de input (inclui validação ValidacaoDatas)
    Route::get('/find', [BungalowController::class, 'all_avalible'])->name('bungalow.find');
    //Rota "show more" de um Bungalow esspecífico (id)
    Route::get('/show/{id}', [BungalowController::class, 'show_more'])->name('bungalow.show');


    //################  Rotas Locacao:
    //Rota pré-locacao, modal de confirmação de datas e hospedes:
    Route::post('/locacao/pre-reservation', [LocacaoController::class,'recalcularReserva'])->name('bungalow-pre-reservation');
    //Rota para ver todas as Locacoes do user (histórico):
    Route::get('/user/bookings', [LocacaoController::class, 'show_user_bookings'])->name('locacao.user-bookings');




    //Rotas locacao pagamento - paypal:
    Route::get('/transaction', [PaypalController::class, 'createTransaction'])->name('paypal.transaction');
    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    //Rota pagamento sucesso - confirmação
    Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::get('finish-transaction', [PayPalController::class, 'finishTransaction'])->name('finishTransaction');
});




require __DIR__ . '/auth.php';
