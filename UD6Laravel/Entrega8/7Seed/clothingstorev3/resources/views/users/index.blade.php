@extends('layouts.app')

@section('content')
  <h1>Users</h1>

  <p>
    <a href="{{ route('users.create') }}">+ New user</a>
  </p>

  @if ($users->count() === 0)
    <p>No users found.</p>
  @else
    <table border="1" cellpadding="6" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              <a href="{{ route('users.show', $user) }}">Show</a> |
              <a href="{{ route('users.edit', $user) }}">Edit</a> |

              <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this user?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div style="margin-top:10px">
      {{ $users->links() }}
    </div>
  @endif
@endsection