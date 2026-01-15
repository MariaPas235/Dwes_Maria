@extends('layouts.app')

@section('content')
  <h1>Create user</h1>

  <form action="{{ route('users.store') }}" method="POST">
    @include('users._form', ['submitLabel' => 'Create'])
  </form>
@endsection