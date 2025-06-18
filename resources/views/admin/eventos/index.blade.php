<!-- resources/views/admin/eventos/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Gestión de Eventos</h4>
                    <a href="{{ route('admin.eventos.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Nuevo Evento
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Lugar</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventos as $evento)
                                <tr>
                                    <td>{{ $evento->id }}</td>
                                    <td>{{ $evento->nombre }}</td>
                                    <td>{{ $evento->fecha->format('d/m/Y H:i') }}</td>
                                    <td>{{ $evento->auditorio->nombre }}</td>
                                    <td>{{ $evento->categoria->nombre }}</td>
                                    <td>
                                        <span class="badge bg-{{ $evento->estado == 'activo' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($evento->estado) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.eventos.edit', $evento->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $evento->id }})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $eventos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('¿Estás seguro de eliminar este evento?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
@endsection