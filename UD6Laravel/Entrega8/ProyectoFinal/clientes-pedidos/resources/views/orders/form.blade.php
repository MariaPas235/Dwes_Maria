<div class="form-group">
    <label for="order_number">
        <i class="fas fa-shopping-cart"></i> Número de Pedido
    </label>
    <input 
        type="text" 
        id="order_number"
        name="order_number"
        value="{{ old('order_number', $order->order_number ?? '') }}"
        placeholder="Ej: PED-001"
        required>
    @error('order_number')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="client_id">
        <i class="fas fa-user-tie"></i> Cliente
    </label>
    <select id="client_id" name="client_id" required>
        <option value="">-- Selecciona un cliente --</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}"
                {{ old('client_id', $order->client_id ?? '') == $client->id ? 'selected' : '' }}>
                {{ $client->name }} ({{ $client->email }})
            </option>
        @endforeach
    </select>
    @error('client_id')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="date">
        <i class="fas fa-calendar"></i> Fecha del Pedido
    </label>
    <input 
        type="date" 
        id="date"
        name="date"
        value="{{ old('date', $order->date ?? '') }}"
        required>
    @error('date')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="status">
        <i class="fas fa-info-circle"></i> Estado
    </label>
    <select id="status" name="status" required>
        <option value="">-- Selecciona estado --</option>
        <option value="pendiente" {{ old('status', $order->status ?? '') == 'pendiente' ? 'selected' : '' }}>
            Pendiente
        </option>
        <option value="enviado" {{ old('status', $order->status ?? '') == 'enviado' ? 'selected' : '' }}>
            Enviado
        </option>
        <option value="entregado" {{ old('status', $order->status ?? '') == 'entregado' ? 'selected' : '' }}>
            Entregado
        </option>
        <option value="cancelado" {{ old('status', $order->status ?? '') == 'cancelado' ? 'selected' : '' }}>
            Cancelado
        </option>
    </select>
    @error('status')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="total">
        <i class="fas fa-euro-sign"></i> Total
    </label>
    <input 
        type="number" 
        id="total"
        name="total"
        step="0.01"
        min="0"
        value="{{ old('total', $order->total ?? '') }}"
        placeholder="0.00"
        required>
    @error('total')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="notes">
        <i class="fas fa-sticky-note"></i> Notas
    </label>
    <textarea 
        id="notes"
        name="notes"
        placeholder="Notas adicionales sobre el pedido..."
        rows="4">{{ old('notes', $order->notes ?? '') }}</textarea>
    @error('notes')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>
