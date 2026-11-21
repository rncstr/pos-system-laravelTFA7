<!DOCTYPE html>
<html>
<head><title>POS System - Customers</title></head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customers</a> |
        <a href="{{ url('/users') }}">Users</a>
    </nav>
    <hr>
    <h1>Customer Accounts</h1>
    <p><a href="{{ url('/customers/create') }}">+ Create Customer</a></p>

    <ul>
        @foreach($customers as $customer)
            <li>
                <strong>{{ $customer->full_name }}</strong> — Email: {{ $customer->email }} | Phone: {{ $customer->phone }}
                [<a href="{{ url('/customers/' . $customer->id . '/edit') }}">Edit</a>]
            </li>
        @endforeach
    </ul>
</body>
</html>