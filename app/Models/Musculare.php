<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Musculare
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Ejercicio[] $ejercicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Musculare extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ejercicios()
    {
        return $this->hasMany(\App\Models\Ejercicio::class, 'id', 'muscular_id');
    }
    
}
