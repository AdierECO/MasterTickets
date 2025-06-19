@extends('layouts.admin')

@section('title', 'Crear Categoría')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Crear Nueva Categoría</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categorias.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                       id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="icono" class="form-label">Icono (Bootstrap Icons)</label>
                <div class="input-group">
                    <span class="input-group-text">bi-</span>
                    <input type="text" class="form-control @error('icono') is-invalid @enderror" 
                           id="icono" name="icono" value="{{ old('icono') }}" 
                           placeholder="Ej: calendar-event">
                </div>
                <small class="text-muted">
                    <a href="https://icons.getbootstrap.com/" target="_blank">Buscar iconos disponibles</a>
                </small>
                @error('icono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection