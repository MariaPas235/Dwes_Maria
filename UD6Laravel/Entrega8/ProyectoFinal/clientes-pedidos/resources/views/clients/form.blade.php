<div class="form-group">
    <label for="name">
        <i class="fas fa-user"></i> Nombre del Cliente
    </label>
    <input 
        type="text" 
        id="name"
        name="name" 
        value="{{ old('name', $client->name ?? '') }}"
        placeholder="Ej: Juan García López"
        required>
    @error('name')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="email">
        <i class="fas fa-envelope"></i> Email
    </label>
    <input 
        type="email" 
        id="email"
        name="email" 
        value="{{ old('email', $client->email ?? '') }}"
        placeholder="correo@ejemplo.com"
        required>
    @error('email')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="phone">
        <i class="fas fa-phone"></i> Teléfono
    </label>
    <input 
        type="tel" 
        id="phone"
        name="phone" 
        value="{{ old('phone', $client->phone ?? '') }}"
        placeholder="+34 600 00 00 00">
    @error('phone')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="address">
        <i class="fas fa-map-marker-alt"></i> Dirección
    </label>
    <input 
        type="text" 
        id="address"
        name="address" 
        value="{{ old('address', $client->address ?? '') }}"
        placeholder="Calle, número, ciudad, código postal">
    @error('address')
        <span style="color: #e53e3e; font-size: 0.85rem;">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label style="display: flex; align-items: center; gap: 0.5rem;">
        <input 
            type="checkbox" 
            name="active" 
            value="1"
            {{ old('active', $client->active ?? true) ? 'checked' : '' }}>
        <i class="fas fa-check-circle"></i> Marcar como activo
    </label>
</div>
