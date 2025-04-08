@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4 max-w-4xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">User Dashboard</h1>
        
        <!-- Profile Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Profile</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Edit Profile</a>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-1/4">
                    <!-- User Avatar -->
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-2">
                        <span class="text-2xl text-gray-600">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
                <div class="md:w-3/4 space-y-2">
                    <div>
                        <p class="text-sm text-gray-500">Name</p>
                        <p class="font-medium">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium">{{ Auth::user()->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Member Since</p>
                        <p class="font-medium">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- User Orders Section -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Your Orders</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View All</a>
            </div>
            <div class="overflow-hidden">
                <div class="divide-y">
                    <div class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium">Order #1</p>
                            <p class="text-sm text-gray-500">April 10, 2025</p>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            Delivered
                        </span>
                    </div>
                    <div class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium">Order #2</p>
                            <p class="text-sm text-gray-500">April 5, 2025</p>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                            In Progress
                        </span>
                    </div>
                    <div class="py-3 flex justify-between items-center">
                        <div>
                            <p class="font-medium">Order #3</p>
                            <p class="text-sm text-gray-500">March 28, 2025</p>
                        </div>
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">
                            Pending
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions Section (nouveau) -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm text-center">New Order</span>
                </a>
                <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="text-sm text-center">My Account</span>
                </a>
                <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm text-center">Calendar</span>
                </a>
                <a href="#" class="flex flex-col items-center p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm text-center">Messages</span>
                </a>
            </div>
        </div>
        
        <!-- Account & Help Section (nouveau) -->
        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <!-- Account Settings -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Account Settings</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            Notification Settings
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Privacy Settings
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Help & Support -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Help & Support</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Support
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Logout Button -->
        <div class="flex justify-end mb-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
@endsection