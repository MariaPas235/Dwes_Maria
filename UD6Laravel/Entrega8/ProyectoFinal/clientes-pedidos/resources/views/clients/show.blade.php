@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1 style="margin: 0; color: #2d3748;">
                <i class="fas fa-user-circle"></i> {{ $client->name }}
            </h1>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
    <div class="card-body">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <div style="padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; color: white;">
                <p style="opacity: 0.9; margin-bottom: 0.5rem;">Email</p>
                <p style="font-weight: 600; font-size: 1.1rem;">
                    <i class="fas fa-envelope"></i> {{ $client->email }}
                </p>
            </div>
            
            <div style="padding: 1rem; background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%); border-radius: 12px; color: white;">
                <p style="opacity: 0.9; margin-bottom: 0.5rem;">Teléfono</p>
                <p style="font-weight: 600; font-size: 1.1rem;">
                    <i class="fas fa-phone"></i> {{ $client->phone ?? 'No especificado' }}
                </p>
            </div>
            
            <div style="padding: 1rem; background: linear-gradient(135deg, #f5576c 0%, #fa709a 100%); border-radius: 12px; color: white;">
                <p style="opacity: 0.9; margin-bottom: 0.5rem;">Dirección</p>
                <p style="font-weight: 600; font-size: 1.1rem;">
                    <i class="fas fa-map-marker-alt"></i> {{ $client->address ?? 'No especificada' }}
                </p>
            </div>
        </div>

        <hr style="border: none; border-top: 2px solid #e2e8f0; margin: 2rem 0;">

        <h2 style="color: #2d3748; margin-bottom: 1rem;">
            <i class="fas fa-shopping-cart"></i> Pedidos del Cliente
        </h2>

        @if($client->orders->count())
            <div style="display: grid; gap: 1rem;">
                @foreach($client->orders as $order)
                    <div style="border-left: 4px solid #667eea; padding: 1rem; background: #f7fafc; border-radius: 8px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <p style="font-weight: 600; margin-bottom: 0.5rem;">
                                    <i class="fas fa-clipboard"></i> {{ $order->order_number }}
                                </p>
                                <p style="color: #718096; font-size: 0.9rem;">
                                    Fecha: {{ $order->date ?? 'N/A' }}
                                </p>
                            </div>
                            <div style="text-align: right;">
                                <span class="badge badge-{{ strtolower(str_replace(' ', '-', $order->status)) }}">
                                    {{ $order->status }}
                                </span>
                                <p style="margin-top: 0.5rem; font-size: 1.2rem; font-weight: 700; color: #667eea;">
                                    {{ number_format($order->total, 2, ',', '.') }} €
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="padding: 2rem; text-align: center; background: #f7fafc; border-radius: 12px; border: 2px dashed #cbd5e0;">
                <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0; margin-bottom: 1rem;"></i>
                <p style="color: #718096;">Este cliente no tiene pedidos registrados.</p>
            </div>
        @endif

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display: inline;">
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
