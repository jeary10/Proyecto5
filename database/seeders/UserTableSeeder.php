<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserTableSeeder extends Seeder
{
    public function run()
    {
        
        User::create([
            'nombre' => 'Administrador General',
            'email' => 'admin@universidadclub.edu',
            'password' => Hash::make('AdminClub2024!'),
            'rol' => 'admin'
        ]);

        User::create([
            'nombre' => 'María Rodríguez',
            'email' => 'maria.rodriguez@universidadclub.edu',
            'password' => Hash::make('Estudiante2024!'),
            'rol' => 'estudiante'
        ]);

        User::create([
            'nombre' => 'Carlos Sánchez',
            'email' => 'carlos.sanchez@universidadclub.edu',
            'password' => Hash::make('Estudiante2024!'),
            'rol' => 'estudiante'
        ]);

        // Generar usuarios adicionales
        User::factory(50)->create();
    }
}
