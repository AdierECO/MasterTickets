<!-- resources/views/artistas/detalle.blade.php -->
@extends('layouts.app')

@section('title', 'Detalle del Evento')

@section('content')
<div class="container mt-5">
    <!-- Modal de confirmación -->
    <div class="modal fade" id="compraModal" tabindex="-1" aria-labelledby="compraModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="compraModalLabel">Confirmar Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @auth
                        <p>¿Estás seguro que deseas comprar <span id="modalCantidad"></span> boletos en la zona <span id="modalZona"></span> por un total de <span id="modalTotal"></span>?</p>
                    @else
                        <div class="alert alert-warning">
                            <h5><i class="bi bi-exclamation-triangle"></i> Necesitas iniciar sesión</h5>
                            <p>Para comprar boletos, por favor inicia sesión o regístrate.</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrarse</a>
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    @auth
                    <form id="realCompraForm" action="{{ route('artistas.comprar', ['artista' => $nombre]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="evento_id" id="modalEventoId">
                        <input type="hidden" name="seccion_id" id="modalSeccionId">
                        <input type="hidden" name="cantidad" id="modalCantidadInput">
                        <button type="submit" class="btn btn-danger">Confirmar Compra</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Columna izquierda - Imagen del artista -->
        <div class="col-md-5 mb-4">
            <img src="{{ asset('images/'.$nombre.'.jpg') }}" class="img-fluid rounded shadow" alt="{{ $nombre }}">
            
            <!-- Sección de descripción -->
            <div class="card mt-4 border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Descripción del Evento</h4>
                    <p class="card-text">
                        Disfruta de una noche inolvidable con {{ $nombre }} en un concierto exclusivo. 
                        Este evento especial contará con los mayores éxitos de su carrera y sorpresas especiales 
                        para todos los asistentes.
                    </p>
                </div>
            </div>
            
            <!-- Sección de ubicación -->
            <div class="card mt-4 border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Ubicación</h4>
                    <div class="ratio ratio-16x9 mb-3">
                        <iframe src="https://maps.google.com/maps?q=Teatro+Del+IMSS+Toluca+Estado+De+México&output=embed" 
                                allowfullscreen></iframe>
                    </div>
                    <p class="card-text">
                        <strong>Dirección:</strong> Av. Miguel Hidalgo Ote. 607, Barrio de Sta Clara, 50160 Toluca, Estado de México<br>
                        <strong>Capacidad:</strong> 1,500 personas
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Columna derecha - Información principal -->
        <div class="col-md-7">
            <h1 class="display-4 mb-3">{{ strtoupper($nombre) }}</h1>
            <h3 class="text-muted mb-4">Viernes, 18 de julio de 2025 20:30 HRS</h3>
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="bi bi-geo-alt-fill text-danger"></i> Teatro Del IMSS
                    </h4>
                    <p class="card-text">
                        Toluca, Estado De México<br>
                        Av. Miguel Hidalgo Ote. 607<br>
                        Barrio de Sta Clara<br>
                        50160
                    </p>
                </div>
            </div>
            
            <!-- Sección de compra de boletos -->
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Selecciona tus boletos</h4>
                </div>
                <div class="card-body">
                    <form id="compraForm">
                        <input type="hidden" name="evento_id" value="1">
                        
                        <div class="mb-3">
                            <label for="seccion_id" class="form-label">Zona</label>
                            <select class="form-select" id="seccion_id" name="seccion_id" required>
                                <option value="">Selecciona una zona</option>
                                <option value="1" data-precio="695.00" data-nombre="VIP">VIP - $695.00</option>
                                <option value="2" data-precio="580.00" data-nombre="DIAMANTE">DIAMANTE - $580.00</option>
                                <option value="3" data-precio="385.00" data-nombre="PROMOCIÓN 3X2">PROMOCIÓN 3X2 - $385.00</option>
                                <option value="4" data-precio="465.00" data-nombre="ORO">ORO - $465.00</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" id="decrement">-</button>
                                <input type="number" class="form-control text-center" id="cantidad" name="cantidad" value="1" min="1" max="10">
                                <button class="btn btn-outline-secondary" type="button" id="increment">+</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Total</label>
                            <div class="fs-4 fw-bold text-primary" id="total">$0.00</div>
                        </div>

                        <button type="button" class="btn btn-danger w-100 py-3" id="btnComprar">
                            <i class="bi bi-cart-plus"></i> COMPRAR BOLETOS
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Tabla de precios -->
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ZONA</th>
                            <th>TIPO</th>
                            <th>PRECIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>VIP</td>
                            <td>ADULTO</td>
                            <td>$695.00</td>
                        </tr>
                        <tr>
                            <td>DIAMANTE</td>
                            <td>ADULTO</td>
                            <td>$580.00</td>
                        </tr>
                        <tr>
                            <td>PROMOCIÓN</td>
                            <td>3X2</td>
                            <td>$385.00</td>
                        </tr>
                        <tr>
                            <td>ORO</td>
                            <td>ADULTO</td>
                            <td>$465.00</td>
                        </tr>
                    </tbody>
                </table>
                <small class="text-muted">Precios expresados en Pesos (MXN). Evento sujeto a cargo por servicio.</small>
            </div>
        </div>
    </div>
    
    <!-- Footer del evento -->
    <div class="row mt-5">
        <div class="col-12 text-center bg-dark text-white py-3 rounded">
            <h3 class="mb-0">TEATRO DEL IMSS | TOLUCA</h3>
            <p class="mb-0">18 DE JULIO | 20:30 HRS</p>
        </div>
    </div>
</div>

@section('styles')
<style>
    .table thead th {
        background-color: #343a40;
        color: white;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
        padding: 10px 30px;
        font-weight: bold;
        transition: all 0.3s;
    }
    .btn-danger:hover {
        background-color: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .modal-backdrop {
        opacity: 0.5 !important;
    }
</style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const seccionSelect = document.getElementById('seccion_id');
    const cantidadInput = document.getElementById('cantidad');
    const totalElement = document.getElementById('total');
    const incrementBtn = document.getElementById('increment');
    const decrementBtn = document.getElementById('decrement');
    const btnComprar = document.getElementById('btnComprar');
    const compraModal = new bootstrap.Modal(document.getElementById('compraModal'));
    
    // Elementos del modal
    const modalZona = document.getElementById('modalZona');
    const modalCantidad = document.getElementById('modalCantidad');
    const modalTotal = document.getElementById('modalTotal');
    const modalEventoId = document.getElementById('modalEventoId');
    const modalSeccionId = document.getElementById('modalSeccionId');
    const modalCantidadInput = document.getElementById('modalCantidadInput');

    function calcularTotal() {
        const precio = seccionSelect.selectedOptions[0]?.dataset.precio || 0;
        const cantidad = cantidadInput.value;
        const total = (parseFloat(precio) * parseInt(cantidad)).toFixed(2);
        totalElement.textContent = `$${total}`;
        return {precio, cantidad, total};
    }

    function actualizarModal() {
        const datos = calcularTotal();
        const zonaNombre = seccionSelect.selectedOptions[0]?.dataset.nombre || '';
        
        modalZona.textContent = zonaNombre;
        modalCantidad.textContent = datos.cantidad;
        modalTotal.textContent = `$${datos.total}`;
        modalEventoId.value = document.querySelector('input[name="evento_id"]').value;
        modalSeccionId.value = seccionSelect.value;
        modalCantidadInput.value = datos.cantidad;
    }

    // Eventos para calcular total
    seccionSelect.addEventListener('change', calcularTotal);
    cantidadInput.addEventListener('change', calcularTotal);
    cantidadInput.addEventListener('input', calcularTotal);
    
    incrementBtn.addEventListener('click', function() {
        if (parseInt(cantidadInput.value) < 10) {
            cantidadInput.value = parseInt(cantidadInput.value) + 1;
            calcularTotal();
        }
    });
    
    decrementBtn.addEventListener('click', function() {
        if (parseInt(cantidadInput.value) > 1) {
            cantidadInput.value = parseInt(cantidadInput.value) - 1;
            calcularTotal();
        }
    });
    
    // Evento para el botón de comprar
    btnComprar.addEventListener('click', function() {
        if (seccionSelect.value === '') {
            alert('Por favor selecciona una zona');
            return;
        }
        
        actualizarModal();
        compraModal.show();
    });
    
    // Calcular total inicial
    calcularTotal();
});
</script>
@endpush
@endsection