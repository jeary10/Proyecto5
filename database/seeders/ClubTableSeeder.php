<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\User; 


class ClubTableSeeder extends Seeder
{
    public function run()
    {
        // Clubes predeterminados
        $clubes = [
            [
                'nombre' => 'Club de Programación',
                'descripcion' => 'Espacio para desarrollar habilidades de programación y compartir conocimientos tecnológicos.',
            ],
            [
                'nombre' => 'Club de Debate',
                'descripcion' => 'Fomentamos el pensamiento crítico y las habilidades de oratoria.',
            ],
            [
                'nombre' => 'Club de Música',
                'descripcion' => 'Reunión de estudiantes apasionados por la música y las artes escénicas.',
            ],
            [
                'nombre' => 'Club de Fotografía',
                'descripcion' => 'Exploramos la creatividad a través de la captura de imágenes.',
            ],
            [
                'nombre' => 'Club de Ciencias',
                'descripcion' => 'Investigación y experimentación científica para estudiantes curiosos.',
            ]
        ];

        // Obtener algunos usuarios para ser presidentes
        $usuarios = User::where('rol', 'estudiante')->get();

        foreach ($clubes as $clubData) {
            $presidente = $usuarios->random();

            Club::create([
                'nombre' => $clubData['nombre'],
                'descripcion' => $clubData['descripcion'],
                'presidente_id' => $presidente->id
            ]);
        }

        // Generar clubes adicionales
        Club::factory(10)->create();
    }
}
