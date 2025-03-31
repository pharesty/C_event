<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event- About us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f0f0f0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header styles */
        header {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-weight: bold;
            font-size: 24px;
            color: #000;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 25px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        
        .nav-links a.active {
            font-weight: bold;
            color: #0066cc;
        }
        
        .auth-buttons {
            display: flex;
            align-items: center;
        }
        
        .login-btn {
            margin-right: 15px;
            color: #333;
            text-decoration: none;
        }
        
        .signup-btn {
            background-color: #0066cc;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
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
        <div class="container">
            <nav>
                <a href="#" class="logo" >C_event</a>
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                    <li><a href="/about" class="active">About us</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="#" class="login-btn">Log in</a>
                    <a href="#" class="signup-btn">Sign up</a>
                </div>
            </nav>
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