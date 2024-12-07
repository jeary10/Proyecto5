<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password123'), 
            'rol' => $this->faker->randomElement(['admin', 'estudiante']),
            'remember_token' => Str::random(10),
        ];
    }
}
