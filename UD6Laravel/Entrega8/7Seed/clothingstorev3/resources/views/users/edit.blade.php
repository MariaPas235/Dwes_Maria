@extends('layouts.app')

@section('content')
  <h1>Edit user</h1>

  <form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    @include('users._form', ['submitLabel' => 'Update'])
  </form>
@endsection