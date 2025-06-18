<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditorio extends Model
{
    use HasFactory;

    protected $table = 'auditorios';
    protected $fillable = ['nombre', 'direccion', 'capacidad', 'foto'];
}