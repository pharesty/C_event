:<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event- Pricing</title>
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/price.css') }}"> -->
    <style>
        /* Reset et styles de base */
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: var(--light-bg);
    color: var(--text-color);
    line-height: 1.6;
}

header {
    background-color: #4F46E5;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    position: sticky;
    top: 0;
    z-index: 100;
    padding: 1rem 0;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2rem;
}

.logo {
    font-size: 1.8rem;
    font-weight: 700;
    color: white;
    position: relative;
}

.logo::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30%;
    height: 3px;
    background-color: #F59E0B;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-links a {
    text-decoration: none;
    color: white;
    font-weight: 500;
    transition: color 0.3s ease;
    position: relative;
}

.nav-links a::after {
    content: "";
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #F59E0B;
    transition: width 0.3s ease;
}

.nav-links a:hover::after {
    width: 100%;
}

.auth-buttons {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.login-btn, .signup-btn {
    padding: 0.6rem 1.5rem;
    border-radius: var(--border-radius);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.login-btn {
    border: 1px solid white;
    color: white;
    background: transparent;
}

.login-btn:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

.signup-btn {
    background-color: white;
    color: #4F46E5;
    border: 1px solid transparent;
}

.signup-btn:hover {
    background-color: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
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
                @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="login-btn">
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
                @endif
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
            <div class="price">7500XAF <span class="price-detail">/month</span></div>
            <p class="description">For individuals and small teams event. </p>
            <button> Get Started with Basic </button>
        </div>

        <div class="card pro-card">
            <div class="tag">Most Popular</div>
            <h2>Pro</h2>
            <div class="price">15000XAF <span class="price-detail">/month</span></div>
            <p class="description">For startups, conferences and growing businesses <br> For events information and a reduction of 25% per event reservation. </p>
            <button>Get Started with Pro</button>
        </div>

        <div class="card">
            <h2>Business</h2>
            <div class="price">25000XAF <span class="price-detail">/month</span></div>
            <p class="description">For organizations with advanced needs <br> For events information and a reduction of 20% per event reservation. </p>
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