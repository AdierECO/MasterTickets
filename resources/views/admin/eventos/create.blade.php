@extends('layouts.admin')

@section('title', 'Crear Nuevo Evento')

@section('content')
<div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-calendar-plus"></i> Nuevo Evento
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.eventos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Evento</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror" 
                                       id="fecha" name="fecha" value="{{ old('fecha') }}" required>
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="time" class="form-control @error('hora') is-invalid @enderror" 
                                       id="hora" name="hora" value="{{ old('hora') }}" required>
                                @error('hora')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen Promocional</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" 
                               id="imagen" name="imagen" accept="image/*">
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Formatos: JPEG, PNG (Max 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label for="auditorio_id" class="form-label">Auditorio</label>
                        <select class="form-select @error('auditorio_id') is-invalid @enderror" 
                                id="auditorio_id" name="auditorio_id" required>
                            <option value="">Seleccione un auditorio</option>
                            @foreach($auditorios as $auditorio)
                                <option value="{{ $auditorio->id }}" {{ old('auditorio_id') == $auditorio->id ? 'selected' : '' }}>
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
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio ($)</label>
                                <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                                       id="precio" name="precio" value="{{ old('precio') }}" required>
                                @error('precio')
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.eventos.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-x-circle"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar Evento
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Estilos consistentes con edit.blade.php */
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
    .invalid-feedback {
        display: block;
    }
    .text-muted {
        font-size: 0.85rem;
    }
</style>
@endsection