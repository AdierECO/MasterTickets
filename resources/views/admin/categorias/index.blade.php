@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Categorías de Eventos</h5>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Nueva Categoría
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Icono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            @if($categoria->icono)
                            <i class="bi bi-{{ $categoria->icono }} fs-5"></i>
                            <span class="ms-2 d-none d-md-inline">({{ $categoria->icono }})</span>
                            @else
                                <span class="text-muted">Sin ícono</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.categorias.edit', $categoria->id) }}" 
                               class="btn btn-sm btn-warning"
                               title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" 
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection