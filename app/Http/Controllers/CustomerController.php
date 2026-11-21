<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers', [
            'customers' => Customer::all(),
        ]);
    }

    public function create()
    {
        return view('customers-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:50',
        ]);

        Customer::create([
            'full_name' => $validated['full_name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'] ?? '',
        ]);

        return redirect('/customers');
    }

    public function edit(Customer $customer)
    {
        return view('customers-edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:50',
        ]);

        $customer->update([
            'full_name' => $validated['full_name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'] ?? '',
        ]);

        return redirect('/customers');
    }
}