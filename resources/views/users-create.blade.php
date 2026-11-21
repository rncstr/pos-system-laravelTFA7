<!DOCTYPE html>
<html>
<head><title>POS System - Create User</title></head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customers</a> |
        <a href="{{ url('/users') }}">Users</a>
    </nav>
    <hr>
    <h1>Create User</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/users') }}" method="POST">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="{{ old('full_name') }}"><br><br>

        <button type="submit">Save User</button>
        <a href="{{ url('/users') }}">Cancel</a>
    </form>
</body>
</html>