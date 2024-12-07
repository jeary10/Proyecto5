<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Club;
use App\Models\User; 


class ClubFactory extends Factory
{
    protected $model = Club::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->catchPhrase(),
            'descripcion' => $this->faker->paragraph(),
            'presidente_id' => User::factory(), 
        ];
    }
}
