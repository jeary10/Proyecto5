<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;


class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        return [
            'usuario_id' => User::factory(),
            'club_id' => Club::factory(),
            'rol' => $this->faker->randomElement(['miembro', 'presidente']),
            'estado' => $this->faker->randomElement(['pendiente', 'aprobado']),
        ];
    }
}
