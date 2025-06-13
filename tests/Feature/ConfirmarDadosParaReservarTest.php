<?php

namespace Tests\Feature;

use App\Models\Bungalow;
use App\Models\Locacao;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();

    //vamos buscar
    $this->bungalow = Bungalow::find(5);

    //se nao existir, criamos
    if (!$this->bungalow) {
        $tipoBensId = DB::table('tipo_bens')->insertGetId(['nome' => 'Fallback Tipo Bem']);
        $marcaId = DB::table('marcas')->insertGetId([
            'nome' => 'Teste Marca',
            'tipo_bem_id' => $tipoBensId,
            'observacao' => 'Nenhuma',
        ]);
        $this->bungalow = Bungalow::create([
            'id' => 5, // Tenta criar com ID 5, se ainda não existir
            'marca_id' => $marcaId,
            'modelo' => 'Teste Modelo',
            'registo_unico_publico' => 'AL345678',
            'numero_quartos' => 2,
            'numero_hospedes' => 4,
            'numero_casas_banho' => 1,
            'numero_camas' => 2,
            'ano' => 2020,
            'manutencao' => false,
            'preco_diario' => 100.00,
            'observacao' => 'Teste',
        ]);
    }
});

test('Se o método recalcularReserva redireciona para pre-reservation', function () {

    //vamos montar o cenário: temos uma session
    session([
        'dados-busca-final' => [
            'bungalow_id' => $this->bungalow->id,
            'data_inicio' => '2024-06-01',
            'data_fim' => '2024-06-05',
            'hospedes' => 2,
            'total' => 400,
            'inicial' => 40,
        ]
    ]);

    //agora, vamos agir: como o autenticado fazendo a requisicao post
    $response = $this->actingAs($this->user)->post('/transaction', [
        'data_inicio' => '2024-07-15',
        'data_fim' => '2024-07-20',
        'hospedes' => 4,
    ]);


    //verificacoes
    $response->assertStatus(200);
    $response->assertViewIs('paypal.transaction');

    $expectedTotal = 5 * $this->bungalow->preco_diario;
    $expectedInicial = $expectedTotal * 0.1;

    $assertDadosBuscaFinal = function ($dadosFinais) use ($expectedTotal, $expectedInicial) {
        return $dadosFinais['bungalow_id'] === $this->bungalow->id &&
               $dadosFinais['data_inicio'] === '2024-07-15' &&
               $dadosFinais['data_fim'] === '2024-07-20' &&
               $dadosFinais['hospedes'] === 4 &&
               (float)$dadosFinais['total'] === $expectedTotal &&
               (float)$dadosFinais['inicial'] === $expectedInicial;
    };

    $this->assertSessionHas('dados-busca-final', $assertDadosBuscaFinal);
    $response->assertViewHas('dados-busca-final', $assertDadosBuscaFinal);
});


test('recalcularReserva retorna erro de indisponibilidade', function () {
    //vamos montar o cenário
    // criar uma reserva
    Locacao::create([
        'bungalow_id' => $this->bungalow->id,
        'user_id' => $this->user->id,
        'data_inicio' => '2024-07-16',
        'data_fim' => '2024-07-18',
        'hospedes' => 2,
        'total' => 300,
        'inicial' => 30,
        'status' => 'confirmada',
    ]);

    session([
        'dados-busca-final' => [
            'bungalow_id' => $this->bungalow->id,
            'data_inicio' => '2024-06-01',
            'data_fim' => '2024-06-05',
            'hospedes' => 2,
            'total' => 400,
            'inicial' => 40,
        ]
    ]);

    //agir
    $response = $this->actingAs($this->user)
        ->post('/transaction', [
            'data_inicio' => '2024-07-15',
            'data_fim' => '2024-07-20',
            'hospedes' => 4,
        ]);

    // Verificar
    $response->assertRedirect();
    $response->assertSessionHasErrors('indisponibilidade');
    $response->assertSessionHasInput([
        'data_inicio' => '2024-07-15',
        'data_fim' => '2024-07-20',
        'hospedes' => 4,
    ]);

    $this->assertSessionHas('dados-busca-final.bungalow_id', $this->bungalow->id);
});

afterEach(function () {
    unset($this->user);
    unset($this->bungalow);
});
