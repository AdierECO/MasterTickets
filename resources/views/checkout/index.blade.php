<!-- resources/views/checkout/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Información de Pago</h4>
                </div>
                <div class="card-body">
                    <form id="payment-form" action="{{ route('checkout.procesar') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <h5 class="mb-3">Método de Pago</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="metodo_pago" id="tarjeta" value="tarjeta" checked>
                                <label class="form-check-label" for="tarjeta">
                                    <i class="bi bi-credit-card"></i> Tarjeta de Crédito/Débito
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metodo_pago" id="paypal" value="paypal">
                                <label class="form-check-label" for="paypal">
                                    <i class="bi bi-paypal"></i> PayPal
                                </label>
                            </div>
                        </div>

                        <div id="tarjeta-form">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nombre_tarjeta" class="form-label">Nombre en la Tarjeta</label>
                                    <input type="text" class="form-control" id="nombre_tarjeta" name="nombre_tarjeta" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="numero_tarjeta" class="form-label">Número de Tarjeta</label>
                                    <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="mes_expiracion" class="form-label">Mes Expiración</label>
                                    <select class="form-select" id="mes_expiracion" name="mes_expiracion" required>
                                        @for($i = 1; $i <= 12; $i++)
                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="anio_expiracion" class="form-label">Año Expiración</label>
                                    <select class="form-select" id="anio_expiracion" name="anio_expiracion" required>
                                        @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="mb-3">Información de Facturación</h5>
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
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="{{ auth()->user()->correo }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="codigo_postal" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-lock"></i> Pagar ${{ number_format($total, 2) }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Resumen de Compra</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        @foreach($items as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item['evento']->nombre }} ({{ $item['seccion']->nombre_seccion }})</span>
                            <span>${{ number_format($item['seccion']->precio * $item['cantidad'], 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-3">
                            <span>{{ $item['cantidad'] }} x ${{ number_format($item['seccion']->precio, 2) }}</span>
                            <span>{{ $item['evento']->fecha->format('d/m/Y') }}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Servicio:</span>
                        <span>${{ number_format($servicio, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                        <span>IVA:</span>
                        <span>${{ number_format($iva, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold fs-5">
                        <span>Total:</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tarjetaRadio = document.getElementById('tarjeta');
    const paypalRadio = document.getElementById('paypal');
    const tarjetaForm = document.getElementById('tarjeta-form');

    function togglePaymentForm() {
        if (tarjetaRadio.checked) {
            tarjetaForm.style.display = 'block';
        } else {
            tarjetaForm.style.display = 'none';
        }
    }

    tarjetaRadio.addEventListener('change', togglePaymentForm);
    paypalRadio.addEventListener('change', togglePaymentForm);
    
    // Inicializar
    togglePaymentForm();
});
</script>
@endpush
@endsection