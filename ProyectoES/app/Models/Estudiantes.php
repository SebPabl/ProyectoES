<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    protected $table = 'estudiantes';

    public function asistencias(): HasMany
    {
        return $this->hasMany(Asistencia::class);
    }

    public function clases(): BelongsToMany
    {
        return $this->belongsToMany(Clase::class, 'estudiante_clase');
    }
}
