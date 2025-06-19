@extends('layouts.admin')

@section('title', 'Crear Nuevo Auditorio')

@section('content')
<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-building-add"></i> Nuevo Auditorio
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.auditorios.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                               id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" class="form-control @error('capacidad') is-invalid @enderror" 
                               id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required>
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="foto" class="form-label">URL de la Foto del Auditorio</label>
                        <input type="url" class="form-control @error('foto') is-invalid @enderror" 
                            id="foto" name="foto" value="{{ old('foto') }}">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Ejemplo: https://example.com/imagen.jpg</small>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.auditorios.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-x-circle"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar Auditorio
                </button>
            </div>
        </form>
    </div>
</div>
@endsection