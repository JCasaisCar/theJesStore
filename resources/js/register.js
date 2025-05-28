"use strict";
if (document.body.id === 'registerPage') {
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password-confirm');
    const passwordStrengthBars = document.querySelectorAll('.password-strength');
    const matchIcon = document.getElementById('password-match-icon');
    const matchMessage = document.getElementById('password-match-message');
    const matchText = document.getElementById('match-text');
    const registerBtn = document.getElementById('register-btn');
    const termsCheckbox = document.getElementById('terms');

    passwordInput.addEventListener('input', function () {
        const password = this.value;
        let strength = 0;

        if (password.length >= 8) strength++;
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
        if (/\d/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;

        passwordStrengthBars.forEach((bar, index) => {
            if (index < strength) {
                const colors = ['bg-red-400', 'bg-yellow-400', 'bg-blue-400', 'bg-green-400'];
                bar.className = `h-1 flex-1 rounded password-strength ${colors[strength - 1]}`;
            } else {
                bar.className = 'h-1 flex-1 bg-gray-200 rounded password-strength';
            }
        });

        checkPasswordMatch();
    });

    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword.length > 0) {
            matchMessage.classList.remove('hidden');
            if (password === confirmPassword) {
                matchIcon.className = 'fas fa-check text-green-400';
                matchIcon.classList.remove('hidden');
                matchText.textContent = 'Las contraseñas coinciden';
                matchMessage.className = 'text-xs text-green-600';
            } else {
                matchIcon.className = 'fas fa-times text-red-400';
                matchIcon.classList.remove('hidden');
                matchText.textContent = 'Las contraseñas no coinciden';
                matchMessage.className = 'text-xs text-red-600';
            }
        } else {
            matchMessage.classList.add('hidden');
            matchIcon.classList.add('hidden');
        }

        updateSubmitButton();
    }

    function updateSubmitButton() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const termsAccepted = termsCheckbox.checked;

        registerBtn.disabled = !(password.length >= 8 && password === confirmPassword && termsAccepted);
    }

    termsCheckbox.addEventListener('change', updateSubmitButton);
});
}