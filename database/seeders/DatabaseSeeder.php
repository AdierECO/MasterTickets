<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        // Verificar si ya existen administradores
        if (User::where('role', 'admin')->count() < 2) {
            // Crear primer administrador
            User::firstOrCreate(
                ['email' => 'adierortix@gmail.com'],
                [
                    'name' => 'Adier Ortiz',
                    'password' => Hash::make('123456'),
                    'role' => 'admin'
                ]
            );

            // Crear segundo administrador
            User::firstOrCreate(
                ['email' => 'arturomartinez@gmail.com'],
                [
                    'name' => 'Arturo Martinez',
                    'password' => Hash::make('123456'),
                    'role' => 'admin'
                ]
            );
        }
    }
}