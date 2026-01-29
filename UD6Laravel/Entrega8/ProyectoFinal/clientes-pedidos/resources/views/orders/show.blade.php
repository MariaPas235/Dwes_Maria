@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1 style="margin: 0; color: #2d3748;">
                <i class="fas fa-receipt"></i> Pedido {{ $order->order_number }}
            </h1>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <div style="padding: 1rem; background: #667eea; border-radius: 12px; color: white;">
                <p style="opacity: 0.9; margin-bottom: 0.5rem; font-weight: 500;">Fecha</p>
                <p style="font-weight: 600; font-size: 1.1rem;">
                    <i class="fas fa-calendar"></i> {{ $order->date }}
                </p>
            </div>
            
            <div style="padding: 1rem; background: #48bb78; border-radius: 12px; color: white;">
                <p style="opacity: 0.9; margin-bottom: 0.5rem; font-weight: 500;">Estado</p>
                <p style="font-weight: 600; font-size: 1.1rem;">
                    <span class="badge badge-{{ strtolower(str_replace(' ', '-', $order->status)) }}">
                        {{ $order->status }}
                    </span>
                </p>
            </div>
            
            <div style="padding: 1rem; background: #f5a623; border-radius: 12px; color: white;">
                <p style="opacity: 0.9; margin-bottom: 0.5rem; font-weight: 500;">Total</p>
                <p style="font-weight: 600; font-size: 1.2rem;">
                    <i class="fas fa-euro-sign"></i> {{ number_format($order->total, 2, ',', '.') }}
                </p>
            </div>
        </div>

        <div style="padding: 1.5rem; background: #f7fafc; border-radius: 12px; margin-bottom: 2rem; border-left: 4px solid #667eea;">
            <h3 style="color: #2d3748; margin-bottom: 0.5rem;">
                <i class="fas fa-user-tie"></i> Cliente
            </h3>
            <p style="font-weight: 600; color: #4a5568; margin-bottom: 0.25rem;">
                {{ $order->client->name }}
            </p>
            <p style="color: #718096; font-size: 0.9rem;">
                <i class="fas fa-envelope"></i> {{ $order->client->email }}
            </p>
            <p style="color: #718096; font-size: 0.9rem;">
                <i class="fas fa-phone"></i> {{ $order->client->phone ?? 'N/A' }}
            </p>
        </div>

        @if($order->notes)
            <div style="padding: 1.5rem; background: #f7fafc; border-radius: 12px; margin-bottom: 2rem; border-left: 4px solid #667eea;">
                <h3 style="color: #2d3748; margin-bottom: 0.5rem;">
                    <i class="fas fa-sticky-note"></i> Notas
                </h3>
                <p style="color: #4a5568;">{{ $order->notes }}</p>
            </div>
        @endif

        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?');">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
