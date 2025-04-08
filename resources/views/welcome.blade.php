<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4F46E5;
            --secondary-color: #8B5CF6;
            --accent-color: #F59E0B;
            --text-color: #1F2937;
            --light-bg: #F9FAFB;
            --dark-bg: #111827;
            --border-radius: 8px;
        }
        
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
            background-color: var(--primary-color);
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
            background-color: var(--accent-color);
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
            background-color: var(--accent-color);
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
            background-color: transparent;
            color:white;
            border: 1px solid white;        }
        
    .signup-btn:hover {
            /* background-color: rgba(255, 255, 255, 0.9);  */
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
        }
        
        .image-upload-icon {
            position: fixed;
            right: 20px;
            bottom: 100px;
            width: 50px;
            height: 50px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 90;
        }
        
        .image-upload-icon:hover {
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.5);
        }
        
        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            gap: 2rem;
            min-height: calc(100vh - 80px);
        }
        
        .hero-content {
            flex: 1;
            max-width: 600px;
        }
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .hero p {
            font-size: 1.1rem;
            color: #4B5563;
            margin-bottom: 2rem;
        }
        
        .hero-cta {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        
        .try-free-btn, .how-it-works-btn {
            padding: 0.8rem 1.8rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 180px;
        }
        
        .try-free-btn {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }
        
        .try-free-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
        }
        
        .how-it-works-btn {
            background-color: transparent;
            border: 1px solid #D1D5DB;
            color: var(--text-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .how-it-works-btn::before {
            content: "▶";
            font-size: 0.8rem;
            color: var(--primary-color);
        }
        
        .how-it-works-btn:hover {
            background-color: #F3F4F6;
        }
        
        .trusted-text {
            font-size: 0.9rem;
            color: #6B7280;
            text-align: center;
            margin-top: 1rem;
        }
        
        .hero-graphic {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        .hero-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.15));
            animation: float 6s ease-in-out infinite;
        }
        
        /* Featured Content Section */
        .featured-content {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 2rem;
        }
        
        .featured-content h2 {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: var(--text-color);
        }
        
        .feature-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card-image {
            width: 100%;
            height: 200px;
            background-color: #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            position: relative;
            overflow: hidden;
        }
        
        .card-image i {
            font-size: 2rem;
            position: absolute;
            z-index: 1;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-content h3 {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--text-color);
        }
        
        .card-content p {
            color: #6B7280;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        
        .card-content a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: gap 0.3s ease;
        }
        
        .card-content a:hover {
            gap: 0.7rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark-bg);
            color: white;
            padding: 3rem 0;
            margin-top: 4rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }
        
        .footer-description {
            color: #D1D5DB;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .footer-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .footer-section h3::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary-color);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #D1D5DB;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #9CA3AF;
            font-size: 0.9rem;
        }
        
        /* Decorative elements */
        .hero-graphic::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(to right, rgba(79, 70, 229, 0.1), rgba(139, 92, 246, 0.1));
            z-index: -1;
            animation: pulse 4s ease-in-out infinite;
        }
        
        .hero-graphic::after {
            content: "";
            position: absolute;
            top: 20%;
            right: 15%;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(245, 158, 11, 0.1);
            z-index: -1;
            animation: pulse 4s ease-in-out infinite 1s;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: scale(0.95);
                opacity: 0.7;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.9;
            }
            100% {
                transform: scale(0.95);
                opacity: 0.7;
            }
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column-reverse;
                text-align: center;
                padding: 1rem;
            }
            
            .nav-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .auth-buttons {
                margin-top: 1rem;
            }
            
            .hero-content {
                max-width: 100%;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-cta {
                justify-content: center;
            }
            
            .hero-graphic {
                margin-bottom: 2rem;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .social-links {
                justify-content: center;
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
    
    <!-- Image upload icon -->
    <div class="image-upload-icon">
        <i class="fas fa-image"></i>
    </div>
    
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Book Your Community Event</h1>
                <p>A community event is a gathering organized to bring people together for a shared purpose, such as celebrating, networking, fundraising, or raising awareness. These events can include festivals, charity drives, cultural celebrations, workshops, and social meetups, fostering connections and strengthening community bonds.</p>
                <div class="hero-cta">
                    <a href="#try" class="try-free-btn">Try for free</a>
                    <a href="#how-it-works" class="how-it-works-btn">See how it works</a>
                </div>
                <p class="trusted-text">Trusted by individuals and teams at the world's best companies</p>
            </div>
            <div class="hero-graphic">
                <img src="{{ asset('concert.jpg') }}" alt="Community events illustration" class="hero-image">
            </div>
        </section>
        
        <section class="featured-content">
            <h2>Discover Popular Events</h2>
            <div class="feature-cards">
                <div class="feature-card">
                    <div class="card-image">
                        <i class="fas fa-plus"></i>
                        <img src="{{ asset('mindef.jpg') }}" alt="Event image placeholder">
                    </div>
                    <div class="card-content">
                        <h3>Cultural Festivals</h3>
                        <p>Explore vibrant cultural festivals that celebrate diversity and heritage through music, food, and traditions.</p>
                        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="card-image">
                        <i class="fas fa-plus"></i>
                        <img src="{{ asset('charity.jpg') }}" alt="Event image placeholder">
                    </div>
                    <div class="card-content">
                        <h3>Charity Fundraisers</h3>
                        <p>Join impactful charity events that bring communities together to support important causes and initiatives.</p>
                        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="card-image">
                        <i class="fas fa-plus"></i>
                        <img src="{{ asset('congres.jpg') }}" alt="Event image placeholder">
                    </div>
                    <div class="card-content">
                        <h3>Community Workshops</h3>
                        <p>Participate in educational workshops that develop skills, share knowledge, and foster community collaboration.</p>
                        <a href="#">Learn more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <div class="footer-logo">C_event</div>
                <p class="footer-description">Your trusted platform for organizing and discovering community events that bring people together and strengthen bonds.</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-link"><i class="far fa-envelope"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/events">Events</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                    <li><a href="/about">About Us</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Resources</h3>
                <ul class="footer-links">
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/support">Support</a></li>
                    <li><a href="/terms">Terms of Service</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact</h3>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt"></i> Yaounde, Cameroon</li>
                    <li><i class="fas fa-phone"></i> +237 690 59 75 65</li>
                    <li><i class="fas fa-envelope"></i> djaphetphares@icloud.com</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 C_event. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>