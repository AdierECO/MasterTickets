<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre', 
        'descripcion',
        'fecha_hora',
        'auditorio_id',
        'categoria_id',
        'imagen',
        'precio',
        'capacidad'
    ];
    protected $dates = ['fecha_hora', 'deleted_at'];
    protected $casts = [
        'fecha_hora' => 'datetime:Y-m-d H:i:s',
    ];

    public function auditorio()
    {
        return $this->belongsTo(Auditorio::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}