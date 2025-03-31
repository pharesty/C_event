document.addEventListener('DOMContentLoaded', () => {
    const signupForm = document.getElementById('signupForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const strengthIndicator = document.querySelector('.strength-indicator');

    // Password strength checker
    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length > 7) strength++;
        if (password.match(/[a-z]+/)) strength++;
        if (password.match(/[A-Z]+/)) strength++;
        if (password.match(/[0-9]+/)) strength++;
        if (password.match(/[$@#&!]+/)) strength++;

        return strength;
    }

    // Update password strength indicator
    passwordInput.addEventListener('input', (e) => {
        const password = e.target.value;
        const strength = checkPasswordStrength(password);
        
        strengthIndicator.style.backgroundColor = getStrengthColor(strength);
        strengthIndicator.style.width = `${strength * 20}%`;
    });

    // Color for strength indicator
    function getStrengthColor(strength) {
        if (strength <= 1) return '#FF4D4D';     // Weak
        if (strength <= 3) return '#FFC107';     // Medium
        return '#4CAF50';                        // Strong
    }

    // Form validation
    signupForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const termsCheckbox = document.getElementById('terms');

        // Basic validation
        if (password !== confirmPassword) {
            alert('Passwords do not match');
            return;
        }

        if (!termsCheckbox.checked) {
            alert('Please agree to the terms and conditions');
            return;
        }

        // If all validations pass, you would typically send data to backend
        console.log('Form is valid. Ready to submit!');
        // signupUser(formData);
    });
}); 