<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            // preencher apenas as colunas obrigatórias ($fillable)
            'name'  =>  'Andre Paes',
            'email' =>  'devap@gmail.com',
            'password'  =>  bcrypt('12345678')
        ]);
    }
}
