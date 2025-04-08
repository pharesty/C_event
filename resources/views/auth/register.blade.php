<x-guest-layout>
    <style>
        /* Variables to match your main site */
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #8B5CF6;
            --accent-color: #F59E0B;
            --text-color: #1F2937;
            --light-bg: #F9FAFB;
            --border-radius: 8px;
        }
        
        /* Background Image with Overlay */
        body {
            background-image: url('/assets/img/auth-background.jpg');
            /* background-image: url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30'); */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            position: relative;
            min-height: 100vh;
        }
        
        /* body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
            pointer-events: none;
        } */

        .form-container, .form-header {
            position: relative;
            z-index: 1;
        }

        .bg-white {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
            max-width: 500px;
            margin: 2rem auto;
            z-index: 1;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-top: 1.5rem;
        }
        
        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: #6B7280;
            font-size: 0.95rem;
        }
        
        input[type="text"],
        input[type="email"], 
        input[type="password"] {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #D1D5DB;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus, 
        input[type="password"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.25);
            outline: none;
        }
        
        .x-primary-button {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 0.8rem 1.8rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .x-primary-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }
        
        a.underline {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        a.underline:hover {
            text-decoration: underline;
        }
        
        .form-container {
            padding: 2rem;
        }
        
        /* Social Login Styles */
        .social-login-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .social-login-text {
            color: #6B7280;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            position: relative;
        }
        
        .social-login-text::before,
        .social-login-text::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 25%;
            height: 1px;
            background-color: #D1D5DB;
        }
        
        .social-login-text::before {
            left: 0;
        }
        
        .social-login-text::after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .social-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 8px;
            border: 1px solid #D1D5DB;
            background-color: white;
            transition: all 0.3s ease;
        }
        
        .social-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .social-button img {
            width: 24px;
            height: 24px;
        }
        
        .legal-text {
            font-size: 0.8rem;
            color: #6B7280;
            text-align: center;
            margin-top: 1rem;
        }
        
        .legal-text a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .legal-text a:hover {
            text-decoration: underline;
        }
        
        .help-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--primary-color);
            font-size: 0.9rem;
            text-decoration: none;
        }
        
        .help-link:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Form header -->
    <div class="form-header">
        <h2>Create Account</h2>
        <p>Join our community to organize and discover events</p>
    </div>

    <div class="form-container">
        <!-- Social Login Section -->
        <div class="social-login-container">
            <p class="social-login-text">Ou connectez-vous avec</p>
            <div class="social-buttons">
                <a href="#" class="social-button">
                    <img src="https://cdn-icons-png.flaticon.com/512/0/747.png" alt="Apple">
                </a>
                <a href="#" class="social-button">
                    <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="Google">
                </a>
                <a href="#" class="social-button">
                    <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook">
                </a>
            </div>
            <p class="legal-text">
                En cliquant sur Continuer ou sur les icônes Apple, Google ou Facebook, vous acceptez les 
                <a href="#">Conditions générales d'utilisation</a> et la 
                <a href="#">Politique de confidentialité</a> d'Eventbrite.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                
                <x-primary-button class="ms-4 x-primary-button">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
        
        <a href="#" class="help-link">Vous avez besoin d'aide pour trouver vos billets ?</a>
    </div>
</x-guest-layout>