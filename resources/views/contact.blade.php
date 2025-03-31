:
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMR_event</title>
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    
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
    <main class="contact-page">
        <div class="contact-container">
            <div class="contact-content">
                <div class="contact-info">
                    <h1>Get in Touch</h1>
                    <p>Have a question or suggestion? We'd love to hear from you. Fill out the form and we'll get back to you as soon as possible.</p>

                    <div class="contact-details">
                        <div class="contact-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>+1 (555) 123-4567</span>
                        </div>
                        <div class="contact-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span>support@eventmanager.com</span>
                        </div>
                        <div class="contact-detail">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>San Francisco, CA, USA</span>
                        </div>
                    </div>
                </div>

                <form class="contact-form" id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input
                                type="text"
                                id="firstName"
                                name="firstName"
                                placeholder="Enter your first name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input
                                type="text"
                                id="lastName"
                                name="lastName"
                                placeholder="Enter your last name"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number (Optional)</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject</option>
                            <option value="support">Customer Support</option>
                            <option value="sales">Sales Inquiry</option>
                            <option value="billing">Billing Question</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea
                            id="message"
                            name="message"
                            placeholder="Write your message here"
                            rows="5"
                            required></textarea>
                    </div>

                    <div class="form-group checkbox">
                        <input
                            type="checkbox"
                            id="newsletter"
                            name="newsletter">
                        <label for="newsletter">
                            Subscribe to our newsletter for updates and special offers
                        </label>
                    </div>

                    <button type="submit" class="contact-submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <p>&copy; 2025 Event Manager. All rights reserved.</p>
                <div class="social-links">
                    <a href="#" class="social-icon">Twitter</a>
                    <a href="#" class="social-icon">Facebook</a>
                    <a href="#" class="social-icon">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contactForm = document.getElementById('contactForm');

            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();

                // Collect form data
                const formData = {
                    firstName: document.getElementById('firstName').value,
                    lastName: document.getElementById('lastName').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    subject: document.getElementById('subject').value,
                    message: document.getElementById('message').value,
                    newsletter: document.getElementById('newsletter').checked
                };

                // Basic form validation
                if (!validateForm(formData)) {
                    return;
                }

                // Simulated form submission (replace with actual AJAX/fetch call)
                submitForm(formData);
            });

            function validateForm(data) {
                // Email validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(data.email)) {
                    alert('Please enter a valid email address');
                    return false;
                }

                // Phone validation (optional)
                if (data.phone && !/^\+?[\d\s()-]{10,}$/.test(data.phone)) {
                    alert('Please enter a valid phone number');
                    return false;
                }

                // Message length check
                if (data.message.trim().length < 10) {
                    alert('Please provide a more detailed message');
                    return false;
                }

                return true;
            }

            function submitForm(data) {
                // Simulate form submission
                console.log('Form data:', data);

                // In a real-world scenario, you'd use fetch or axios
                // fetch('/api/contact', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //     },
                //     body: JSON.stringify(data)
                // })
                // .then(response => response.json())
                // .then(result => {
                //     // Handle successful submission
                //     alert('Message sent successfully!');
                // })
                // .catch(error => {
                //     // Handle errors
                //     alert('Failed to send message. Please try again.');
                // });

                alert('Message sent successfully!');
                contactForm.reset();
            }
        });
    </script>
</body>

</html>