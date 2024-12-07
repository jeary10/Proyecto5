<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use Carbon\Carbon; 
use App\Models\Club;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        $fechaInicio = $this->faker->dateTimeBetween('+1 week', '+2 months');
        $fechaFin = Carbon::instance($fechaInicio)->addDays($this->faker->numberBetween(1, 3));

        return [
            'nombre' => $this->faker->catchPhrase(),
            'descripcion' => $this->faker->paragraph(),
            'club_id' => Club::factory(),
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
        ];
    }
}
