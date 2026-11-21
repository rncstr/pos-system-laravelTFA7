<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed 5 Customers
        $customers = [
            ['full_name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '0917-111-2222'],
            ['full_name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '0918-222-3333'],
            ['full_name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone' => '0919-333-4444'],
            ['full_name' => 'Bob Brown', 'email' => 'bob@example.com', 'phone' => '0920-444-5555'],
            ['full_name' => 'Charlie Davis', 'email' => 'charlie@example.com', 'phone' => '0921-555-6666'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }

        // Seed 5 Users
        $users = [
            ['username' => 'admin_castro', 'full_name' => 'Aaron Castro'],
            ['username' => 'cashier_jane', 'full_name' => 'Jane Smith'],
            ['username' => 'stock_alice', 'full_name' => 'Alice Johnson'],
            ['username' => 'cashier_bob', 'full_name' => 'Bob Brown'],
            ['username' => 'manager_charlie', 'full_name' => 'Charlie Davis'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}