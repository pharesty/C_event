:<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event</title>
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/price.css') }}"> -->
    <style>
        /* Reset et styles de base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

/* Header et navigation */
header {
    width: 100%;
    background-color: #ffffff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo */
.logo {
    font-size: 24px;
    font-weight: bold;
    color: #000000;
    text-decoration: none;
}

/* Navigation */
nav {
    flex: 1;
    display: flex;
    justify-content: center;
}

.nav-links {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    text-decoration: none;
    color: #333333;
    font-size: 16px;
    transition: color 0.2s ease;
    padding: 5px 0;
}

.nav-links a:hover {
    color: #0066cc;
}

.nav-links a.active {
    color: #0066cc;
    font-weight: 500;
}

/* Boutons d'authentification */
.auth-buttons {
    display: flex;
    align-items: center;
}

.login-btn {
    color: #333333;
    text-decoration: none;
    margin-right: 15px;
    font-size: 16px;
}

.signup-btn {
    background-color: #0066cc;
    color: white !important;
    padding: 8px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.signup-btn:hover {
    background-color: #0055b3;
}

/* Style pour le bouton Dashboard */
.auth-buttons .inline-block {
    padding: 8px 20px;
    color: #333;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.auth-buttons .inline-block:hover {
    border-color: rgba(0, 0, 0, 0.2);
}

/* Styles pour l'en-tête de la page de pricing */
.pricing-header {
    text-align: center;
    max-width: 800px;
    margin: 60px auto 40px;
    padding: 0 20px;
}

.pricing-header h1 {
    font-size: 40px;
    font-weight: bold;
    color: #000;
    margin-bottom: 15px;
}

.pricing-header p {
    font-size: 18px;
    color: #555;
    line-height: 1.5;
}

/* Styles pour les cartes de pricing */
.pricing-cards {
    display: flex;
    justify-content: center;
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto 80px;
    padding: 0 20px;
    flex-wrap: wrap;
}

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    padding: 40px 30px;
    min-width: 300px;
    flex: 1;
    display: flex;
    flex-direction: column;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pro-card {
    border: 2px solid #0066cc;
    transform: translateY(-10px);
}

.tag {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #0066cc;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
}

.card h2 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #000;
}

.price {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #000;
}

.price-detail {
    font-size: 16px;
    font-weight: normal;
    color: #777;
}

.description {
    color: #555;
    margin-bottom: 30px;
    flex-grow: 1;
}

.card button {
    background-color: #0066cc;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
}

.card button:hover {
    background-color: #0055b3;
}

/* Media queries pour la responsivité */
@media (max-width: 992px) {
    .nav-container {
        flex-wrap: wrap;
    }
    
    nav {
        order: 3;
        width: 100%;
        margin-top: 15px;
        justify-content: flex-start;
    }
    
    .nav-links {
        justify-content: flex-start;
    }
    
    .nav-links li:first-child {
        margin-left: 0;
    }
    
    .pricing-cards {
        flex-direction: column;
        align-items: center;
    }
    
    .card {
        width: 100%;
        max-width: 400px;
    }
    
    .pro-card {
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .nav-links {
        flex-wrap: wrap;
    }
    
    .auth-buttons {
        margin-left: auto;
    }
    
    .pricing-header h1 {
        font-size: 32px;
    }
    
    .pricing-header p {
        font-size: 16px;
    }
}

@media (max-width: 576px) {
    .nav-container {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .logo {
        margin-bottom: 10px;
    }
    
    .auth-buttons {
        margin-left: 0;
        margin-top: 15px;
        align-self: flex-start;
    }
}
    </style>
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
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="login-btn"
                    >
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

    <div class="pricing-header">
        <h1>Pricing</h1>
        <p>Our pricing is not expensive, but it is not cheap either, it's exactly what it should be</p>
    </div>

    <div class="pricing-cards">
        <div class="card">
            <h2>Basic</h2>
            <div class="price">$9 <span class="price-detail">/month</span></div>
            <p class="description">For individuals and small teams</p>
            <button>Get Started with Basic</button>
        </div>

        <div class="card pro-card">
            <div class="tag">Most Popular</div>
            <h2>Pro</h2>
            <div class="price">$19 <span class="price-detail">/month</span></div>
            <p class="description">For startups and growing businesses</p>
            <button>Get Started with Pro</button>
        </div>

        <div class="card">
            <h2>Business</h2>
            <div class="price">$99 <span class="price-detail">/month</span></div>
            <p class="description">For organizations with advanced needs</p>
            <button>Get Started with Business</button>
        </div>

    <script>
         // Optional interactivity
         const cards = document.querySelectorAll('.card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'scale(1.03)';
                card.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'scale(1)';
                card.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>