<!DOCTYPE html>
<html>
<head><title>POS System - Edit User</title></head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customers</a> |
        <a href="{{ url('/users') }}">Users</a>
    </nav>
    <hr>
    <h1>Edit User</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>Current Avatar:</p>
    <img
        src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('default-avatar.svg') }}"
        alt="{{ $user->full_name }}"
        width="80"
        height="80"
        style="border-radius: 50%; object-fit: cover; margin-bottom: 15px;"
    >

    <form action="{{ url('/users/' . $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username', $user->username) }}"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}"><br><br>

        <label>Profile Picture (Image, Max 2MB):</label><br>
        <input type="file" name="avatar" accept="image/*"><br><br>

        <button type="submit">Update User</button>
        <a href="{{ url('/users') }}">Cancel</a>
    </form>
</body>
</html>