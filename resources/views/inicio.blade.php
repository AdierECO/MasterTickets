@extends('layouts.app') {{-- Asegúrate de tener un layout base --}}

@section('title', 'Inicio')

@section('content')
<!-- Título principal -->
<div class="container mt-5">
    <h1 class="text-center mb-4">
        <i class="bi bi-music-note me-2"></i>Bienvenidos a MasterTicket<i class="bi bi-music-note me-2"></i>
    </h1>

    <!-- Carrusel de imágenes con Bootstrap -->
    <div id="carouselConciertos" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow">
            <div class="carousel-item active">
                <img src="{{ asset('images/250505164835265_performer_img_BadBunny1200x400px.jpg') }}" class="d-block w-100" alt="Concierto 1">
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

    <!-- Botón de inicio de sesión -->
    <div class="text-center mt-2 mb-5">
        <a href="{{ route('home.explorar') }}" class="btn btn-primary btn-lg">Explorar más</a>
    </div>
</div>
@endsection
