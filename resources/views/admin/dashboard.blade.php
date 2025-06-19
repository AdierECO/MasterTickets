@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Panel de Administración</h1>
    
    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Eventos Totales</h5>
                    <h2>{{ $stats['total_eventos'] }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Próximos Eventos</h5>
                    <h2>{{ $stats['eventos_proximos'] }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <h2>{{ $stats['total_usuarios'] }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Auditorios</h5>
                    <h2>{{ $stats['total_auditorios'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de próximos eventos -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5><i class="bi bi-calendar-event"></i> Próximos Eventos</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Auditorio</th>
                            <th>Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats['ultimos_eventos'] as $evento)
                        <tr>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->fecha_hora->format('d/m/Y H:i') }}</td>
                            <td>{{ $evento->auditorio->nombre }}</td>
                            <td>{{ $evento->categoria->nombre }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay eventos próximos</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Eventos recientes añadidos -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5><i class="bi bi-clock-history"></i> Eventos Recientes</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha Creación</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['eventos_recientes'] as $evento)
                        <tr>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->created_at->diffForHumans() }}</td>
                            <td>
                                @if($evento->fecha_hora > now())
                                    <span class="badge bg-success">Próximo</span>
                                @else
                                    <span class="badge bg-secondary">Pasado</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.eventos.edit', $evento->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection