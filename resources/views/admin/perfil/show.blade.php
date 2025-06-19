@extends('layouts.admin')

@section('title', 'Mi Perfil')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-person-circle"></i> Mis Datos
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            @if(auth()->user()->foto_perfil)
                                <img src="{{ asset('storage/' . auth()->user()->foto_perfil) }}" 
                                     class="img-thumbnail rounded-circle mb-3" 
                                     style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 150px; height: 150px; margin: 0 auto;">
                                    <i class="bi bi-person-fill" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h5 class="text-primary">{{ auth()->user()->name }}</h5>
                                <p class="text-muted mb-1">{{ auth()->user()->email }}</p>
                                <p class="mb-1">
                                    <span class="badge bg-secondary">
                                        {{ ucfirst(auth()->user()->role) }}
                                    </span>
                                </p>
                                <p class="text-muted small">
                                    Registrado el: {{ auth()->user()->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.perfil.edit') }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i> Editar Perfil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection