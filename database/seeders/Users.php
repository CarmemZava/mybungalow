<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Carmem Zavattieri',
            'email' => 'carmemz@hotmail.com',
            'password' => Hash::make('zava123'),
            'telefone' => '+351930555555',
            'nif' => '298366666',
            'data_nascimento' => '1993-10-01',
            'morada' => 'Rua A',
        ]);
    }
}
