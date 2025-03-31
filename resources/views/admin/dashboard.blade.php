@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Admin Dashboard</h1>

        <!-- Stats Section -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <p class="text-3xl">500</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Active Users</h2>
                <p class="text-3xl">450</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Inactive Users</h2>
                <p class="text-3xl">50</p>
            </div>
        </div>

        <!-- Manage Users Section -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">Manage Users</h2>
            <a href="#" class="text-blue-500 hover:text-blue-700">View All Users</a>
            
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
