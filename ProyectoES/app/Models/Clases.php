<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    protected $table = 'clases';

    public function asistencias(): HasMany
    {
        return $this->hasMany(Asistencia::class);
    }

    public function estudiantes(): BelongsToMany
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_clase');
    }

    public function maestros(): BelongsToMany
    {
        return $this->belongsToMany(Maestro::class, 'maestro_clase');
    }

    public function ofrendas(): HasMany
    {
        return $this->hasMany(Ofrenda::class, 'clases_id');
    }
}
