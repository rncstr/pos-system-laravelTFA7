<!DOCTYPE html>
<html>
<head><title>POS System - Edit Customer</title></head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customers</a> |
        <a href="{{ url('/users') }}">Users</a>
    </nav>
    <hr>
    <h1>Edit Customer</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/customers/' . $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="{{ old('full_name', $customer->full_name) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $customer->email) }}"><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}"><br><br>

        <button type="submit">Update Customer</button>
        <a href="{{ url('/customers') }}">Cancel</a>
    </form>
</body>
</html>