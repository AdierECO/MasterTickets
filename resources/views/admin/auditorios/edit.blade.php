@extends('layouts.admin')

@section('title', 'Editar Auditorio')

@section('content')
<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-building-gear"></i> Editar Auditorio: {{ $auditorio->nombre }}
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.auditorios.update', $auditorio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $auditorio->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                               id="direccion" name="direccion" value="{{ old('direccion', $auditorio->direccion) }}" required>
                        @error('direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Foto Actual</label>
                        @if($auditorio->foto)
                            <img src="{{ asset('storage/'.$auditorio->foto) }}" 
                                 class="img-thumbnail d-block mb-2" 
                                 style="max-height: 150px;">
                        @else
                            <div class="bg-light p-3 text-center mb-2">
                                <i class="bi bi-image" style="font-size: 2rem;"></i>
                                <p class="mb-0">Sin imagen</p>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                               id="foto" name="foto" accept="image/*">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" class="form-control @error('capacidad') is-invalid @enderror" 
                               id="capacidad" name="capacidad" value="{{ old('capacidad', $auditorio->capacidad) }}" required>
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.auditorios.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Actualizar Auditorio
                </button>
            </div>
        </form>
    </div>
</div>
@endsection