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