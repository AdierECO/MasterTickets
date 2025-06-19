<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'icono',
        'color'
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function getIconoCompletoAttribute()
    {
        return $this->icono ? 'bi bi-'.$this->icono : 'bi bi-tag';
    }
}