@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1><i class="fas fa-shopping-cart"></i> Pedidos</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo pedido
    </a>
</div>

@if($orders->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nº Pedido</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ str_pad($order->order_number, 4, '0', STR_PAD_LEFT) }}</td>
                <td>{{ $order->client->name }}</td>
                <td>
                    @if($order->status === 'Completado')
                        <span class="badge badge-success">✓ Completado</span>
                    @elseif($order->status === 'Pendiente')
                        <span class="badge badge-warning">⏱ Pendiente</span>
                    @elseif($order->status === 'Cancelado')
                        <span class="badge badge-danger">✗ Cancelado</span>
                    @else
                        <span class="badge badge-info">ℹ {{ $order->status }}</span>
                    @endif
                </td>
                <td style="font-weight: 600; color: #667eea;">{{ number_format($order->total, 2, ',', '.') }} €</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="action-link view-link">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('orders.edit', $order) }}" class="action-link edit-link">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-link delete-link">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="card">
        <div style="text-align: center; padding: 2rem;">
            <i class="fas fa-inbox" style="font-size: 3rem; color: #cbd5e0; margin-bottom: 1rem; display: block;"></i>
            <h3>Sin pedidos aún</h3>
            <p style="color: #718096; margin-bottom: 1.5rem;">Comienza creando tu primer pedido</p>
            <a href="{{ route('orders.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Primer Pedido
            </a>
        </div>
    </div>
@endif
@endsection
