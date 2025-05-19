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
});

//rotas gerais
Route::resources([
    'bungalow'=>BungalowController::class,
    'locacao'=>LocacaoController::class,
]);


//rota home page
Route::get('/home', function(){
    return view('bungalow.home');
});

//rota teste
Route::get('/teste', function(){
    return view('bungalow.teste');
});

//rota show bungalows
//Route::get('/show', function(){
  //  return view('bungalow.bungalow-show');
//});


require __DIR__.'/auth.php';
