<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['nombre', 'email', 'rol'];

    /**
     * Relación para obtener los clubes donde el usuario es presidente.
     */
    public function clubsAsPresidente()
    {
        return $this->hasMany(\App\Models\Club::class, 'presidente_id');
    }

    /**
     * Relación para obtener los miembros del usuario (cuando es miembro de un club).
     */
    public function members()
    {
        return $this->hasMany(\App\Models\Member::class, 'usuario_id');
    }

    /**
     * Atributo virtual que indica si el usuario es presidente de al menos un club.
     * Este atributo NO está en la base de datos, es calculado en el modelo.
     */
    public function getIsPresidenteAttribute()
    {
        return $this->clubsAsPresidente()->exists();
    }

    /**
     * Atributo virtual que devuelve los clubes donde el usuario es presidente.
     * Este atributo NO está en la base de datos, es calculado en el modelo.
     */
    public function getClubsPresidenteAttribute()
    {
        return $this->clubsAsPresidente()->pluck('club_id')->toArray();
    }
}
