<!-- resources/views/perfil/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="avatar mb-3">
                        <img src="{{ asset('storage/' . auth()->user()->imagen) }}" class="rounded-circle" width="150" height="150" alt="Avatar">
                    </div>
                    <h4>{{ auth()->user()->nombre }} {{ auth()->user()->apellidos }}</h4>
                    <p class="text-muted">{{ auth()->user()->correo }}</p>
                    <p><i class="bi bi-telephone"></i> {{ auth()->user()->telefono }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Menú</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('perfil') }}">
                                <i class="bi bi-person"></i> Mi Perfil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('perfil.compras') }}">
                                <i class="bi bi-receipt"></i> Mis Compras
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('perfil.tarjetas') }}">
                                <i class="bi bi-credit-card"></i> Tarjetas Guardadas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('perfil.configuracion') }}">
                                <i class="bi bi-gear"></i> Configuración
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Mi Perfil</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('perfil.actualizar') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ auth()->user()->nombre }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ auth()->user()->apellidos }}" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ auth()->user()->telefono }}"