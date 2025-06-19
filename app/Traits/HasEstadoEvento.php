<?php

namespace App\Traits;

trait HasEstadoEvento
{
    public function getEstadoAttribute()
    {
        if ($this->fecha_hora < now()) {
            return 'Finalizado';
        } elseif ($this->fecha_hora->diffInDays(now()) <= 7) {
            return 'Próximo';
        } else {
            return 'Programado';
        }
    }

    public function scopeProximos($query)
    {
        return $query->where('fecha_hora', '>', now())
                    ->orderBy('fecha_hora', 'asc');
    }

    public function scopePasados($query)
    {
        return $query->where('fecha_hora', '<', now())
                    ->orderBy('fecha_hora', 'desc');
    }
}