<!-- resources/views/eventos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="mb-0">Próximos Eventos</h2>
        </div>
        <div class="col-md-6 text-end">
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                    Filtrar por Categoría
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('eventos.index') }}">Todos</a></li>
                    @foreach($categorias as $categoria)
                    <li><a class="dropdown-item" href="{{ route('eventos.index', ['categoria' => $categoria->id]) }}">{{ $categoria->nombre }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($eventos as $evento)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $evento->imagen) }}" class="card-img-top" alt="{{ $evento->nombre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $evento->nombre }}</h5>
                    <p class="card-text text-muted">
                        <i class="bi bi-calendar"></i> {{ $evento->fecha->format('d M Y, H:i') }}<br>
                        <i class="bi bi-geo-alt"></i> {{ $evento->auditorio->nombre }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-primary">{{ $evento->categoria->nombre }}</span>
                        <span class="text-success fw-bold">Desde ${{ number_format($evento->precio_minimo, 2) }}</span>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-primary w-100">
                        Ver Detalles
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $eventos->links() }}
        </div>
    </div>
</div>
@endsection