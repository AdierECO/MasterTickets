<!-- resources/views/eventos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>{{ $evento->nombre }}</h1>
            <p class="text-muted">
                <i class="bi bi-calendar"></i> {{ $evento->fecha->format('l, d F Y - H:i') }}<br>
                <i class="bi bi-geo-alt"></i> {{ $evento->auditorio->nombre }}, {{ $evento->auditorio->ciudad }}
            </p>
        </div>
        <div class="col-md-4 text-end">
            <span class="badge bg-primary fs-6">{{ $evento->categoria->nombre }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Descripción del Evento</h4>
                    <p class="card-text">{{ $evento->descripcion }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Ubicación</h4>
                    <div class="ratio ratio-16x9 mb-3">
                        <iframe src="https://maps.google.com/maps?q={{ urlencode($evento->auditorio->direccion) }}&output=embed" 
                                allowfullscreen></iframe>
                    </div>
                    <p class="card-text">
                        <strong>Dirección:</strong> {{ $evento->auditorio->direccion }}<br>
                        <strong>Capacidad:</strong> {{ number_format($evento->auditorio->capacidad) }} personas
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Selecciona tus boletos</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                        
                        <div class="mb-3">
                            <label for="seccion_id" class="form-label">Zona</label>
                            <select class="form-select" id="seccion_id" name="seccion_id" required>
                                <option value="">Selecciona una zona</option>
                                @foreach($evento->secciones as $seccion)
                                <option value="{{ $seccion->id }}" data-precio="{{ $seccion->precio }}">
                                    {{ $seccion->nombre_seccion }} - ${{ number_format($seccion->precio, 2) }}
                                </option>
                                @endforeach
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

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-cart-plus"></i> Agregar al carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const seccionSelect = document.getElementById('seccion_id');
    const cantidadInput = document.getElementById('cantidad');
    const totalElement = document.getElementById('total');
    const incrementBtn = document.getElementById('increment');
    const decrementBtn = document.getElementById('decrement');

    function calcularTotal() {
        const precio = seccionSelect.selectedOptions[0]?.dataset.precio || 0;
        const cantidad = cantidadInput.value;
        const total = precio * cantidad;
        totalElement.textContent = `$${total.toFixed(2)}`;
    }

    seccionSelect.addEventListener('change', calcularTotal);
    cantidadInput.addEventListener('change', calcularTotal);
    
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
});
</script>
@endpush
@endsection