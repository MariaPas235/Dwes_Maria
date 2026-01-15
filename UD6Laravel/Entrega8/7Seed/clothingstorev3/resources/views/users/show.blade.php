@extends('layouts.app')

@section('content')
  <h1>User details</h1>

  <p><strong>ID:</strong> {{ $user->id }}</p>
  <p><strong>Name:</strong> {{ $user->name }}</p>
  <p><strong>Email:</strong> {{ $user->email }}</p>

  <p>
    <a href="{{ route('users.index') }}">Back</a> |
    <a href="{{ route('users.edit', $user) }}">Edit</a>
  </p>
@endsection