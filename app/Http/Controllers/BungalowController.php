<?php

namespace App\Http\Controllers;

use App\Domain\Bungalow\Models\Bungalow;
use Illuminate\Http\Request;

class BungalowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //search - buscas por nome, local
        // TIRAR A BUSCA PELO LOCAL E INCLUIR POR DATA DE ENTRADA/SAIDA e ADULTOS
        $search = $request->input('search');
        $bungalows = Bungalow::with('marca', 'localizacao');


        // if ($search) {
        //     $bungalows = $bungalows->where('modelo', 'LIKE', "%{$search}%");
        // }

        //É preciso criar o modelo Locacao, e assim, verificar neste acho que por meio de JOIN os bungalows disponíveis
        // $search =$request->input('check_in', 'check_out', 'adultos');
        // $bungalows = Bungalow::with('marca', 'localizacao')

        $bungalows = $bungalows->paginate(8);

        return view('bungalow.index', compact('bungalows'));
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
