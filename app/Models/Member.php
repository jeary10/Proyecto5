<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Member
 *
 * @property $id
 * @property $usuario_id
 * @property $club_id
 * @property $rol
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Club $club
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Member extends Model
{
    use HasFactory, Notifiable;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['usuario_id', 'club_id', 'rol', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function club()
    {
        return $this->belongsTo(\App\Models\Club::class, 'club_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id', 'id');
    }
    
}
