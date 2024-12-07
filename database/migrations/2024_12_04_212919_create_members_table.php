<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('club_id')->constrained('clubs');
            $table->enum('rol', ['miembro', 'presidente']);
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->timestamps();

            $table->unique(['usuario_id', 'club_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
