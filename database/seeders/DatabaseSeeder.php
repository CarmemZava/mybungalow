<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Locacao;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        //Seeder criado com o meu Registro
        //$this->call(Users::class);

        //factory de User fake
        //User::factory(10)->create();

        //factory de Locacao fake --> Criar apenas depois da criação do User, tem dependência do user_id
        //Locacao::factory(20)->create();


        // php artisan db:seed
    }
}
