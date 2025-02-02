document.addEventListener("DOMContentLoaded", function() {
    // Toggle for password field
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;
        this.classList.toggle('fa-eye-slash');
    });

    // Toggle for confirm password field
    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
    const passwordConfirmationField = document.getElementById('password_confirmation');

    togglePasswordConfirmation.addEventListener('click', function() {
        const type = passwordConfirmationField.type === 'password' ? 'text' : 'password';
        passwordConfirmationField.type = type;
        this.classList.toggle('fa-eye-slash');
    });
});
