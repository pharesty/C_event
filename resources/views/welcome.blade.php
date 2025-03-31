<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header>
        <div class="nav-container">
            <div class="logo">C_event</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                    <li><a href="/about">About us</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                @if (Route::has('login'))
                <!-- <nav class="flex items-center justify-end gap-4"> -->
                @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Dashboard
                </a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="login-btn">
                    Log in
                </a>

                @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="signup-btn">
                    Register
                </a>
                @endif
                @endauth
                <!-- </nav> -->
                @endif
                <!-- <a href="#login" class="login-btn">Log in</a>
                <a href="#signup" class="signup-btn">Sign up</a> -->
            </div>

        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <!-- <span class="free-trial">FREE 30 DAYS TRIAL</span>² -->
                <h1>Book Your Community Event</h1>
               <p>A community event is a gathering organized to bring people together for a shared purpose, such as celebrating, networking, fundraising, or raising awareness. These events can include festivals, charity drives, cultural celebrations, workshops, and social meetups, fostering connections and strengthening community bonds.</p>
                <!-- <p>Un événement communautaire est un rassemblement organisé pour réunir des personnes dans un but commun, tel que la célébration, le réseautage, la collecte de fonds ou la sensibilisation. Il peut s'agir de festivals, d'actions caritatives, de célébrations culturelles, d'ateliers et de rencontres sociales, qui favorisent les connexions et renforcent les liens au sein de la communauté.</p> -->
                <div class="hero-cta">
                    <a href="#try" class="try-free-btn">Try for free</a>
                    <a href="#how-it-works" class="how-it-works-btn">See how it works</a>
                </div>
                <p class="trusted-text">Trusted by individuals and teams at the world's best companies</p>
            </div>
            <div class="hero-graphic">
                <img src="hero-shapes.svg" alt="" class="hero-image">
            </div>
        </section>
    </main>

    <script src="script.js"></script>
</bod>

</html>