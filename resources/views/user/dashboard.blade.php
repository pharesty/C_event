@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">User Dashboard</h1>

        <!-- Profile Section -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Profile</h2>
            <p>Name: {{ Auth::user()->name }}</p>
            <p>Email: {{ Auth::user()->email }}</p>
        </div>

        <!-- User Orders Section -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Your Orders</h2>
            <ul>
                <li>Order #1 - Delivered</li>
                <li>Order #2 - In Progress</li>
                <li>Order #3 - Pending</li>
            </ul>
        </div>

        <!-- Logout Button -->
        <div class="mt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection
