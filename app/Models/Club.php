<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Club
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $presidente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Event[] $events
 * @property Member[] $members
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Club extends Model
{
    use HasFactory, Notifiable;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'presidente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'presidente_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class, 'id', 'club_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(\App\Models\Member::class, 'id', 'club_id');
    }
    
    public function president()
    {
        return $this->belongsTo(\App\Models\User::class, 'presidente_id', 'id');
    }

    // Accessor para extraer el nombre del presidente
    public function getPresidentNameAttribute()
    {
        return $this->president->nombre ?? 'Sin presidente';
    }
}
