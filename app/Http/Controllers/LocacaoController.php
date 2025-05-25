<?php

namespace App\Http\Controllers;

use App\Models\Locacao;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
