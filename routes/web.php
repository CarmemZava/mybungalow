<?php

use App\Http\Controllers\BungalowController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas bungalows acessíveis apenas com Login/Registro:
    //Rota busca de Bungalows
    Route::get('/find', [BungalowController::class,'all_avalible'])->name('bungalow.find');
    //Rota "show more" de um Bungalow esspecífico (id)
    Route::get('/show/{id}',[BungalowController::class,'show_more'])->name('bungalow.show');
});


//rota home page
Route::get('/home', function(){
    return view('bungalow.home');
});

//rota teste
Route::get('/teste', function(){
    return view('bungalow.teste');
});



require __DIR__.'/auth.php';
