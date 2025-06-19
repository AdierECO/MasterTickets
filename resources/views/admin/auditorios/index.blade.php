@extends('layouts.admin')

@section('title', 'Auditorios')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Auditorios Disponibles</h5>
        <a href="{{ route('admin.auditorios.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Nuevo Auditorio
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($auditorios as $auditorio)
                    <tr>
                        <td>{{ $auditorio->nombre }}</td>
                        <td>{{ $auditorio->capacidad }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.auditorios.edit', $auditorio->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.auditorios.destroy', $auditorio->id) }}" 
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
                        <td colspan="4" class="text-center">No hay auditorios registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection