<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';
    protected $fillable = ['nombre', 'fecha', 'lugar_id', 'categoria', 'estado'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($evento) {
            if (!in_array($evento->estado, ['Cancelado', 'Próximo', 'Activo'])) {
                throw new \Exception("Estado no válido");
            }
        });
}
}