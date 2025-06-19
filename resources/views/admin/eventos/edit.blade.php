@extends('layouts.admin')

@section('title', 'Editar Evento')

@section('content')
<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-calendar-event"></i> Editar Evento: {{ $evento->nombre }}
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Evento</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $evento->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $evento->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror" 
                                       id="fecha" name="fecha" 
                                       value="{{ old('fecha', $evento->fecha_hora->format('Y-m-d')) }}" required>
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="time" class="form-control @error('hora') is-invalid @enderror" 
                                       id="hora" name="hora" 
                                       value="{{ old('hora', $evento->fecha_hora->format('H:i')) }}" required>
                                @error('hora')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Imagen Actual</label>
                        @if($evento->imagen)
                            <img src="{{ asset('storage/'.$evento->imagen) }}" 
                                 class="img-thumbnail d-block mb-2" 
                                 style="max-height: 150px;">
                        @else
                            <div class="bg-light p-3 text-center mb-2">
                                <i class="bi bi-image" style="font-size: 2rem;"></i>
                                <p class="mb-0">Sin imagen</p>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" 
                               id="imagen" name="imagen" accept="image/*">
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="auditorio_id" class="form-label">Auditorio</label>
                        <select class="form-select @error('auditorio_id') is-invalid @enderror" 
                                id="auditorio_id" name="auditorio_id" required>
                            @foreach($auditorios as $auditorio)
                                <option value="{{ $auditorio->id }}" 
                                    {{ (old('auditorio_id', $evento->auditorio_id) == $auditorio->id) ? 'selected' : '' }}>
                                    {{ $auditorio->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('auditorio_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select class="form-select @error('categoria_id') is-invalid @enderror" 
                                id="categoria_id" name="categoria_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                    {{ (old('categoria_id', $evento->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                                    @if($categoria->icono)
                                        <i class="bi bi-{{ $categoria->icono }} me-2"></i>
                                    @else
                                        <i class="bi bi-tag me-2"></i>
                                    @endif
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio ($)</label>
                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                               id="precio" name="precio" value="{{ old('precio', $evento->precio) }}" required>
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" class="form-control @error('capacidad') is-invalid @enderror" 
                               id="capacidad" name="capacidad" value="{{ old('capacidad', $evento->capacidad) }}" required>
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.eventos.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Actualizar Evento
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Estilos para selects con íconos */
    .form-select option {
        padding: 8px 12px;
    }
    .form-select option .bi {
        display: inline-block;
        margin-right: 8px;
        font-size: 1rem;
        vertical-align: middle;
    }
    .form-select {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        line-height: 1.8;
    }
    
    /* Mejoras visuales generales */
    .img-thumbnail {
        max-width: 100%;
        height: auto;
    }
    .invalid-feedback {
        display: block;
    }
</style>
@endsection