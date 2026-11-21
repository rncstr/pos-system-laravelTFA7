<!DOCTYPE html>
<html>
<head><title>POS System - Users</title></head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customers</a> |
        <a href="{{ url('/users') }}">Users</a>
    </nav>
    <hr>
    <h1>User Accounts</h1>
    <p><a href="{{ url('/users/create') }}">+ Create User</a></p>

    <ul style="list-style: none; padding: 0;">
        @foreach($users as $user)
            <li style="margin-bottom: 12px; display: flex; align-items: center; gap: 12px;">
                <img
                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('default-avatar.svg') }}"
                    alt="{{ $user->full_name }}"
                    width="50"
                    height="50"
                    style="border-radius: 50%; object-fit: cover;"
                >
                <div>
                    <strong>{{ $user->username }}</strong> ({{ $user->full_name }})
                    [<a href="{{ url('/users/' . $user->id . '/edit') }}">Edit</a>]
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>