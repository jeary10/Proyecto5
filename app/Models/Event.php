<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Event
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $club_id
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property Club $club
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Event extends Model
{
    use HasFactory, Notifiable;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'club_id', 'fecha_inicio', 'fecha_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function club()
    {
        return $this->belongsTo(\App\Models\Club::class, 'club_id', 'id');
    }
    
}
