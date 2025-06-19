<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use App\Models\Auditorio;
use App\Models\Categoria;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_eventos' => Evento::count(),
            'eventos_proximos' => Evento::where('fecha_hora', '>', now())->count(),
            'total_usuarios' => User::count(),
            'total_auditorios' => Auditorio::count(),
            'ultimos_eventos' => Evento::with(['auditorio', 'categoria'])
                                  ->where('fecha_hora', '>', now())
                                  ->orderBy('fecha_hora', 'asc')
                                  ->take(5)
                                  ->get(),
            'eventos_recientes' => Evento::latest()
                                    ->take(5)
                                    ->get()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}