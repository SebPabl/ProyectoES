<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofrendas extends Model
{
    protected $table = 'ofrendas';

    public function clase(): BelongsTo
    {
        return $this->belongsTo(Clase::class, 'clases_id');
    }
}
