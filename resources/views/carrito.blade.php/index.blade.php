<!-- resources/views/carrito/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Tu Carrito</h4>
                </div>
                <div class="card-body">
                    @if(count($items) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Evento</th>
                                    <th>Zona</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>
                                        <strong>{{ $item['evento']->nombre }}</strong><br>
                                        <small class="text-muted">{{ $item['evento']->fecha->format('d/m/Y H:i') }}</small>
                                    </td>
                                    <td>{{ $item['seccion']->nombre_seccion }}</td>
                                    <td>
                                        <form action="{{ route('carrito.actualizar') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="evento_id" value="{{ $item['evento']->id }}">
                                            <input type="hidden" name="seccion_id" value="{{ $item['seccion']->id }}">
                                            <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" max="10" 
                                                   class="form-control form-control-sm d-inline-block" style="width: 60px;">
                                        </form>
                                    </td>
                                    <td>${{ number_format($item['seccion']->precio, 2) }}</td>
                                    <td>${{ number_format($item['seccion']->precio * $item['cantidad'], 2) }}</td>
                                    <td>
                                        <form action="{{ route('carrito.eliminar') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="evento_id" value="{{ $item['evento']->id }}">
                                            <input type="hidden" name="seccion_id" value="{{ $item['seccion']->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <h5>Tu carrito está vacío</h5>
                        <p>Explora nuestros eventos y añade boletos a tu carrito</p>
                        <a href="{{ route('eventos.index') }}" class="btn btn-primary">Ver Eventos</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if(count($items) > 0)
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Resumen de Compra</h4>
                </div>
                <div class="card-body">
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
                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100 mt-3">
                        Proceder al Pago
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection