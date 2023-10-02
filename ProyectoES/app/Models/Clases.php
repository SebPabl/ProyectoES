<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Clases extends Model
{
    protected $table = 'clases';

    public function asistencias(): HasMany
    {
        return $this->hasMany(Asistencias::class);
    }

    public function estudiantes(): BelongsToMany
    {
        return $this->belongsToMany(Estudiantes::class, 'estudiante_clase');
    }

    public function maestros(): BelongsToMany
    {
        return $this->belongsToMany(Maestros::class, 'maestro_clase');
    }

    public function ofrendas(): HasMany
    {
        return $this->hasMany(Ofrendas::class, 'clases_id');
    }
}
