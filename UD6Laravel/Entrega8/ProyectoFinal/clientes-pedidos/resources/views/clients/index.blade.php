@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1><i class="fas fa-users"></i> Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo cliente
    </a>
</div>

@if($clients->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>
                    @if($client->active)
                        <span class="badge badge-success">✓ Activo</span>
                    @else
                        <span class="badge badge-danger">✗ Inactivo</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('clients.show', $client) }}" class="action-link view-link">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('clients.edit', $client) }}" class="action-link edit-link">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro?');">
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
            <h3>Sin clientes aún</h3>
            <p style="color: #718096; margin-bottom: 1.5rem;">Comienza creando tu primer cliente</p>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Primer Cliente
            </a>
        </div>
    </div>
@endif
@endsection
