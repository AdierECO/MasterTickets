<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'capacidad',
        'telefono',
        'descripcion',
        'foto'
    ];

    protected $casts = [
        'capacidad' => 'integer'
    ];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function getFotoUrlAttribute()
    {
        return filter_var($this->foto, FILTER_VALIDATE_URL)
            ? $this->foto
            : asset('images/default-auditorio.jpg');
    }
}   