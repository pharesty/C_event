<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event- About us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root{
            --border-radius: 8px
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

        /* Main content styles */
        .about-section {
            text-align: center;
            padding: 80px 0;
        }
        
        .about-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #000;
        }
        
        .about-section p {
            max-width: 600px;
            margin: 0 auto;
            color: #555;
            line-height: 1.6;
        }
        
        /* People illustration */
        .people-illustration {
            display: flex;
            justify-content: center;
            margin-top: 60px;
        }
        
        .person {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 10px;
        }
        
        .head {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        
        .body {
            width: 60px;
            height: 80px;
            border-radius: 30px 30px 20px 20px;
        }
        
        .gray {
            background-color: #666;
        }
        
        .blue {
            background-color: #1E90FF;
        }
        
        .yellow {
            background-color: #FFD700;
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

    <main>
        <div class="container">
            <section class="about-section">
                <h1>About us</h1>
                <!-- <p>We offer revolutionary solution to industry problems. Join Lando community and experience the benefits of company optimization today!</p> -->
                <p>Welcome to our online reservation system for community events! A community event manager is responsible for planning, organizing, and overseeing events that bring people together. Their duties include coordinating logistics, managing budgets, securing venues, promoting the event, and ensuring smooth execution. They work with volunteers, vendors, and stakeholders to create a successful and engaging experience for the community.<br> To reserve your spot, simply follow these steps:
<br>
1. Sign Up or Log In: Create an account or log in to your existing account.
<br>
2. Browse Events: Explore the list of upcoming community events.
<br>
3. Select Your Event: Click on the event you're interested in for more details.
<br>
4. Reserve Your Spot: Choose your preferred time slot or ticket type, then click “Reserve.”
<br>
5. Confirm Details: Fill in any required information and complete the reservation process.
<br>
6. Receive Confirmation: You'll get an email or notification confirming your reservation.
<br>
If you need any assistance, our support team is ready to help. Enjoy your community event!</p>
                <div class="people-illustration">
                    <div class="person">
                        <div class="head gray"></div>
                        <div class="body gray"></div>
                    </div>
                    <div class="person">
                        <div class="head blue"></div>
                        <div class="body blue"></div>
                    </div>
                    <div class="person">
                        <div class="head yellow"></div>
                        <div class="body yellow"></div>
                    </div>
                    <div class="person">
                        <div class="head blue"></div>
                        <div class="body blue"></div>
                    </div>
                    <div class="person">
                        <div class="head yellow"></div>
                        <div class="body yellow"></div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        // Simple JavaScript to make the navigation links interactive
        document.addEventListener('DOMContentLoaded', function() {
            // Get all navigation links
            const navLinks = document.querySelectorAll('.nav-links a');
            
            // Add click event listener to each link
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Remove active class from all links
                    navLinks.forEach(link => link.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                });
            });
            
            // Animation for the people illustration (optional)
            const people = document.querySelectorAll('.person');
            
            // Simple animation to make them appear with a slight delay
            people.forEach((person, index) => {
                person.style.opacity = 0;
                setTimeout(() => {
                    person.style.transition = 'opacity 0.5s ease';
                    person.style.opacity = 1;
                }, 300 * index);
            });
        });
    </script>
</body>
</html>