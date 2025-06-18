@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Título principal -->
<h1 class="text-center mb-4">
    <i class="bi bi-music-note me-2"></i>Bienvenidos a STAGEPASS<i class="bi bi-music-note me-2"></i>
</h1>

<!-- Carrusel de imágenes con Bootstrap -->
<div id="carouselConciertos" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner rounded shadow">
        <div class="carousel-item active">
            <img src="{{ asset('images/bad.jpg') }}" class="d-block w-100" alt="Concierto 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/CSXQpMgUcAAg1FY.png') }}" class="d-block w-100" alt="Concierto 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/GU8eM6FbwAAQqrV.jpg') }}" class="d-block w-100" alt="Concierto 3">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/theweekend.jpg') }}" class="d-block w-100" alt="Concierto 4">
        </div>
    </div>

    <!-- Controles del carrusel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselConciertos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselConciertos" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<!-- Sección de Artistas Destacados -->
<h2 class="text-center mb-4">Eventos</h2>

<!-- Primera fila -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
    <!-- Tarjeta 1 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/bad.jpg') }}" class="card-img-top" alt="Bad Bunny">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Bad Bunny</h5>
                <p class="card-text">Concierto exclusivo en Ciudad de México. ¡No te lo pierdas!</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'BadBunny']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta 2 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/theweekend.jpg') }}" class="card-img-top" alt="The Weeknd">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">The Weeknd</h5>
                <p class="card-text">Gira mundial 2025. Experiencia visual y sonora única.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'theweekend']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta 3 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/dualipa.jpg') }}" class="card-img-top" alt="Dua Lipa">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Dua Lipa</h5>
                <p class="card-text">¡Vibraciones pop! Gira en América Latina confirmada.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'dua']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Segunda fila -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
    <!-- Tarjeta 4 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/taylor.jpg') }}" class="card-img-top" alt="Taylor Swift">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Taylor Swift</h5>
                <p class="card-text">The Eras Tour llega a Latinoamérica en 2025.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'taylorswift']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta 5 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/drake.jpg') }}" class="card-img-top" alt="Drake">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Drake</h5>
                <p class="card-text">It's All a Blur Tour - Edición extendida.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'drake.']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta 6 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/karolg.jpeg') }}" class="card-img-top" alt="Karol G">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Karol G</h5>
                <p class="card-text">Mañana será bonito tour - Nuevas fechas añadidas.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'karolg.']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tercera fila -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    <!-- Tarjeta 7 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/feid.jpeg') }}" class="card-img-top" alt="Feid">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Feid</h5>
                <p class="card-text">Ferxxo Nitro Jam - La gira más esperada del año.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'feid.']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta 8 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/shakira.jpg') }}" class="card-img-top" alt="Shakira">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Shakira</h5>
                <p class="card-text">Tour de regreso con nuevos éxitos y clásicos.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'shakira.']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta 9 -->
    <div class="col">
        <div class="card h-100 shadow border-0 card-hover">
            <img src="{{ asset('images/peso.jpg') }}" class="card-img-top" alt="Peso Pluma">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">Peso Pluma</h5>
                <p class="card-text">Gira internacional con lo mejor del regional mexicano.</p>
                <div class="text-center mt-auto pt-3">
                    <a href="{{ route('artistas.detalle', ['nombre' => 'peso.']) }}" class="btn btn-purple">Ver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .text-purple {
        color: #6f42c1;
    }

    .text-blue {
        color: #007bff;
    }

    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        background-color: #6f42c1;
    }

    .card-hover:hover .card-body {
        color: white;
    }

    .btn-purple {
        background-color: #6f42c1;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 20px;
        transition: all 0.3s ease;
        width: 100px;
    }

    .btn-purple:hover {
        background-color: #5a32a3;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card-hover:hover .btn-purple {
        background-color: white;
        color: #6f42c1;
    }
</style>
@endsection
