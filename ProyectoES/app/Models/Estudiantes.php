<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estudiantes extends Model
{
    protected $fillable = ['nombre', 'apellido', 'edad', 'fecha_nacimiento', 'direccion'];

    public function nombreCompleto()
    {
        return $this->nombre.' '.$this->apellido;
    }
    public function asistencias(): HasMany
    {
        return $this->hasMany(Asistencia::class);
    }

    public function clases(): BelongsToMany
    {
        return $this->belongsToMany(Clases::class, 'estudiante_clase');
    }
}
