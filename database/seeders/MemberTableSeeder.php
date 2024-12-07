<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\User; 
use App\Models\Club;


class MemberTableSeeder extends Seeder
{
    public function run()
    {
        $clubs = Club::all();
        $users = User::where('rol', 'estudiante')->get();

        $clubs->each(function ($club) use ($users) {
            // Asegurar que el presidente es miembro
            Member::firstOrCreate(
                [
                    'usuario_id' => $club->presidente_id,
                    'club_id' => $club->id
                ],
                [
                    'rol' => 'presidente',
                    'estado' => 'aprobado'
                ]
            );

            // Añadir miembros adicionales
            $membersToAdd = $users->random(rand(5, 20))
                ->reject(function ($user) use ($club) {
                    return $user->id === $club->presidente_id;
                });

            $membersToAdd->each(function ($user) use ($club) {
                Member::firstOrCreate(
                    [
                        'usuario_id' => $user->id,
                        'club_id' => $club->id
                    ],
                    [
                        'rol' => 'miembro',
                        'estado' => $this->randomMemberStatus()
                    ]
                );
            });
        });
    }

    private function randomMemberStatus()
    {
        return rand(1, 10) > 2 ? 'aprobado' : 'pendiente';
    }
}
