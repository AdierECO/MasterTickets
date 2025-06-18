@extends('layouts.app')

@section('content')
<div class="container-fluid bg-light" style="min-height: 100vh;">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-white shadow-sm pt-4" style="min-height: 100vh;">
            <h4 class="text-center mb-4">Mi Cuenta : MasterTicket</h4>
            <ul class="list-group list-group-flush" id="sidebarTabs" role="tablist">
                <li class="list-group-item" role="presentation">
                    <button class="btn btn-link text-start w-100" id="eventos-tab" data-bs-toggle="tab" data-bs-target="#eventos" type="button" role="tab" aria-controls="eventos" aria-selected="true">
                        <i class="bi bi-ticket-perforated"></i> Mis Eventos
                    </button>
                </li>
                <li class="list-group-item active" role="presentation">
                    <button class="btn btn-link text-start w-100" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">
                        <i class="bi bi-person-circle"></i> Mi Información
                    </button>
                </li>
                <!-- Resto de las pestañas... -->
                <li class="list-group-item text-danger" role="presentation">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-link text-danger text-start w-100" type="submit">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 py-5">
            <h4 class="mb-3">Bienvenido: {{ strtoupper(auth()->user()->name) }}</h4>

            <div class="tab-content" id="sidebarTabsContent">
                <!-- Mi Información -->
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                            <strong>Mi Información</strong>
                            <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Información Personal</h5>
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Nombre completo</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Correo electrónico</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Rol</label>
                                        <p class="form-control-plaintext">
                                            <span class="badge bg-{{ auth()->user()->role === 'admin' ? 'primary' : 'success' }}">
                                                {{ ucfirst(auth()->user()->role) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Datos Adicionales</h5>
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Fecha de registro</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-muted">Última actualización</label>
                                        <p class="form-control-plaintext">{{ auth()->user()->updated_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resto de las pestañas... -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de Edición -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Contraseña actual (para cambios)</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <small class="text-muted">Solo necesaria si vas a cambiar la contraseña</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Nueva contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-muted">Deja en blanco para mantener la actual</small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection