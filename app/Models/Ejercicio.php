<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ejercicio
 *
 * @property $id
 * @property $muscular_id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Musculare $musculare
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ejercicio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['muscular_id', 'nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function musculare()
    {
        return $this->belongsTo(\App\Models\Musculare::class, 'muscular_id', 'id');
    }
    
}
