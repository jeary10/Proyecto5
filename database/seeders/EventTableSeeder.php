<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User; 
use App\Models\Club;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    public function run()
    {
        $clubs = Club::all();

        // Eventos predeterminados
        $eventosEstandar = [
            [
                'nombre' => 'Hackathon Anual',
                'descripcion' => 'Competencia de desarrollo de software para estudiantes',
                'duracion_dias' => 2
            ],
            [
                'nombre' => 'Conferencia de Fotografía',
                'descripcion' => 'Taller y conferencia sobre técnicas fotográficas modernas',
                'duracion_dias' => 1
            ],
            [
                'nombre' => 'Festival de Música',
                'descripcion' => 'Presentación de talentos musicales de la universidad',
                'duracion_dias' => 3
            ]
        ];

        $clubs->each(function ($club) use ($eventosEstandar) {
            // Crear eventos predeterminados para algunos clubes
            if (rand(1, 3) == 1) {
                $eventoEstandar = $eventosEstandar[array_rand($eventosEstandar)];
                
                Event::create([
                    'nombre' => $eventoEstandar['nombre'],
                    'descripcion' => $eventoEstandar['descripcion'],
                    'club_id' => $club->id,
                    'fecha_inicio' => Carbon::now()->addDays(rand(15, 90)),
                    'fecha_fin' => Carbon::now()->addDays(rand(15, 90) + $eventoEstandar['duracion_dias'])
                ]);
            }

            // Generar eventos adicionales aleatorios
            Event::factory(rand(1, 3))->create([
                'club_id' => $club->id
            ]);
        });
    }
}
