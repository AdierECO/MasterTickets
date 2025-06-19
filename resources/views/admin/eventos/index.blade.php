@extends('layouts.admin')

@section('title', 'Listado de Eventos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Gestión de Eventos</h5>
        <a href="{{ route('admin.eventos.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Nuevo Evento
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha y Hora</th>
                        <th>Auditorio</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eventos as $evento)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $evento->nombre }}</td>
                        <td>
                            @isset($evento->fecha_hora)
                                {{ $evento->fecha_hora->format('d/m/Y H:i') }}
                            @else
                                <span class="text-muted">Fecha no definida</span>
                            @endisset
                        </td>
                        <td>{{ $evento->auditorio->nombre ?? 'N/A' }}</td>
                        <td>
                            @if($evento->categoria)
                                <i class="bi bi-{{ $evento->categoria->icono ?? 'question-circle' }} me-2"></i>
                                {{ $evento->categoria->nombre }}
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.eventos.edit', $evento->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.eventos.destroy', $evento->id) }}" 
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Estás seguro de eliminar este evento?')"
                                        title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay eventos registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($eventos instanceof \Illuminate\Pagination\AbstractPaginator && $eventos->hasPages())
            {{ $eventos->links() }}
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
    .table th {
        white-space: nowrap;
    }
    .pagination {
        justify-content: center;
    }
    .bi {
        font-size: 1.2rem;
        vertical-align: middle;
    }
</style>
@endsection