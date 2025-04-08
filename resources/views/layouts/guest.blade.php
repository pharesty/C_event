<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CMR_event</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("/assets/img/auth-background.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        /* Removed the body::after overlay */
        
        /* Simplified the min-h-screen section - removed the background color overlay */
        .min-h-screen {
            position: relative;
            z-index: 1;
        }
        
        /* Keep the form container styling */
        .w-full.sm\:max-w-md {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 1.0); /* Fully opaque white form */
        }
        
        /* For dark mode */
        .dark .w-full.sm\:max-w-md {
            background-color: rgba(31, 41, 55, 1.0); /* Fully opaque dark form */
        }
        
        .logo-container {
            margin-bottom: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease;
        }
       
        .logo-container:hover {
            transform: scale(1.05);
        }
       
        .logo-link {
            display: inline-block;
            padding: 0.5rem;
            border-radius: var(--border-radius);
            background: white;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.15);
        }
       
        .logo-image {
            height: 60px;
            width: auto;
            /* If you want a gradient border around the logo */
            border-radius: var(--border-radius);
            padding: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="logo-container">
            <a href="/" class="logo-link">
                <img src="{{ asset('lolo.png') }}" alt="Logo" class="logo-image">
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>