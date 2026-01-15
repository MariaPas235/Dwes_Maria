@csrf

<p>
  <label>Name</label><br>
  <input type="text" name="name" value="{{ old('name', $user->name) }}">
</p>

<p>
  <label>Email</label><br>
  <input type="email" name="email" value="{{ old('email', $user->email) }}">
</p>

<p>
  <label>Password (optional)</label><br>
  <input type="password" name="password" value="">
</p>

<button type="submit">{{ $submitLabel }}</button>
<a href="{{ route('users.index') }}">Cancel</a>