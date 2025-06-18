@extends('layouts.app') {{-- Usa tu layout base si tienes uno --}}

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
                <li class="list-group-item" role="presentation">
                    <button class="btn btn-link text-start w-100" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">
                        <i class="bi bi-person-circle"></i> Mi Información
                    </button>
                </li>
                <li class="list-group-item" role="presentation">
                    <button class="btn btn-link text-start w-100" id="tarjetas-tab" data-bs-toggle="tab" data-bs-target="#tarjetas" type="button" role="tab" aria-controls="tarjetas" aria-selected="false">
                        <i class="bi bi-credit-card-2-front"></i> Mis Tarjetas
                    </button>
                </li>
                <li class="list-group-item" role="presentation">
                    <button class="btn btn-link text-start w-100" id="historial-tab" data-bs-toggle="tab" data-bs-target="#historial" type="button" role="tab" aria-controls="historial" aria-selected="false">
                        <i class="bi bi-clock-history"></i> Mi Historial
                    </button>
                </li>
                <li class="list-group-item" role="presentation">
                    <button class="btn btn-link text-start w-100" id="suscripcion-tab" data-bs-toggle="tab" data-bs-target="#suscripcion" type="button" role="tab" aria-controls="suscripcion" aria-selected="false">
                        <i class="bi bi-bell"></i> Mi Suscripción
                    </button>
                </li>
                <li class="list-group-item" role="presentation">
                    <button class="btn btn-link text-start w-100" id="registros-tab" data-bs-toggle="tab" data-bs-target="#registros" type="button" role="tab" aria-controls="registros" aria-selected="false">
                        <i class="bi bi-journal-text"></i> Mis Registros
                    </button>
                </li>
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
            <h4 class="mb-3">Bienvenido: {{ strtoupper('ERIK GASTON CORDERO RICO') }}</h4>

            <div class="tab-content" id="sidebarTabsContent">
                <!-- Mis Eventos -->
                <div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <strong>Mis eventos</strong><br>
                            <small>Aquí encontrarás los boletos para tus próximos eventos</small>
                        </div>
                        <div class="card-body text-center py-5">
                            <h5>¡No hay eventos próximos para los cuales hayas realizado compras!</h5>
                        </div>
                    </div>
                </div>

                <!-- Mi Información -->
                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <strong>Mi Información</strong>
                        </div>
                        <div class="card-body">
                            <p>Aquí puedes mostrar o editar la información del usuario.</p>
                        </div>
                    </div>
                </div>

                <!-- Mis Tarjetas -->
                <div class="tab-pane fade" id="tarjetas" role="tabpanel" aria-labelledby="tarjetas-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <strong>Mis Tarjetas</strong>
                        </div>
                        <div class="card-body">
                            <p>Aquí puedes gestionar tus tarjetas de pago.</p>
                        </div>
                    </div>
                </div>

                <!-- Mi Historial -->
                <div class="tab-pane fade" id="historial" role="tabpanel" aria-labelledby="historial-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            <strong>Mi Historial</strong>
                        </div>
                        <div class="card-body">
                            <p>Historial de compras y actividades.</p>
                        </div>
                    </div>
                </div>

                <!-- Mi Suscripción -->
                <div class="tab-pane fade" id="suscripcion" role="tabpanel" aria-labelledby="suscripcion-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <strong>Mi Suscripción</strong>
                        </div>
                        <div class="card-body">
                            <p>Información sobre tu suscripción actual.</p>
                        </div>
                    </div>
                </div>

                <!-- Mis Registros -->
                <div class="tab-pane fade" id="registros" role="tabpanel" aria-labelledby="registros-tab">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <strong>Mis Registros</strong>
                        </div>
                        <div class="card-body">
                            <p>Registros o notas importantes para ti.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
