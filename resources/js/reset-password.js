"use strict";
if (document.body.id === 'reset-passwordPage') {
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordStrengthBars = document.querySelectorAll('.password-strength');
    const strengthText = document.getElementById('strength-text');
    const passwordLength = document.getElementById('password-length');
    const matchIcon = document.getElementById('password-match-icon');
    const matchMessage = document.getElementById('password-match-message');
    const matchText = document.getElementById('match-text');
    const resetBtn = document.getElementById('reset-btn');

    window.togglePassword = function(fieldId) {
        const field = document.getElementById(fieldId);
        const eyeIcon = document.getElementById(fieldId + '-eye');

        if (field.type === 'password') {
            field.type = 'text';
            eyeIcon.className = 'fas fa-eye-slash';
        } else {
            field.type = 'password';
            eyeIcon.className = 'fas fa-eye';
        }
    };

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const length = password.length;
        let strength = 0;

        passwordLength.textContent = `${length}/8`;
        passwordLength.className = length >= 8 ? 'text-emerald-600 font-semibold' : 'text-gray-500';

        if (length >= 8) strength++;
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
        if (/\d/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;

        passwordStrengthBars.forEach((bar, index) => {
            if (index < strength) {
                const classes = ['bg-red-400', 'bg-yellow-400', 'bg-blue-400', 'bg-emerald-400'];
                bar.className = `h-1 flex-1 ${classes[strength - 1]} rounded password-strength`;
                const labels = ['Débil', 'Regular', 'Buena', 'Excelente'];
                const colors = ['text-red-600', 'text-yellow-600', 'text-blue-600', 'text-emerald-600'];
                strengthText.textContent = labels[strength - 1];
                strengthText.className = `font-semibold ${colors[strength - 1]}`;
            } else {
                bar.className = 'h-1 flex-1 bg-gray-200 rounded password-strength';
            }
        });

        if (length === 0) {
            strengthText.textContent = 'Débil';
            strengthText.className = 'font-semibold text-gray-500';
        }

        checkPasswordMatch();
    });

    confirmPasswordInput.addEventListener('input', checkPasswordMatch);

    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword.length > 0) {
            matchMessage.classList.remove('hidden');
            if (password === confirmPassword && password.length >= 8) {
                matchIcon.className = 'fas fa-check text-emerald-400';
                matchIcon.classList.remove('hidden');
                matchText.textContent = 'Las contraseñas coinciden';
                matchMessage.className = 'text-xs text-emerald-600';
            } else if (password === confirmPassword) {
                matchIcon.className = 'fas fa-exclamation-triangle text-yellow-400';
                matchIcon.classList.remove('hidden');
                matchText.textContent = 'Contraseña muy corta';
                matchMessage.className = 'text-xs text-yellow-600';
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

        if (password.length >= 8 && password === confirmPassword) {
            resetBtn.disabled = false;
            resetBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            resetBtn.disabled = true;
            resetBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }

    updateSubmitButton();
});
}