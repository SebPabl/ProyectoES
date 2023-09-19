<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestros extends Model
{
    protected $table = 'maestros';

    public function clases(): BelongsToMany
    {
        return $this->belongsToMany(Clase::class, 'maestro_clase');
    }
}
