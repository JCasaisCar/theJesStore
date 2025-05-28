"use strict";
if (document.body.id === 'forgot-passwordPage') {
document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const emailIcon = document.getElementById('email-icon');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnLoading = document.getElementById('btn-loading');
    const form = document.getElementById('forgot-form');

    function updateSubmitButton() {
        const email = emailInput.value;
        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        submitBtn.disabled = !isValid;
        submitBtn.classList.toggle('opacity-50', !isValid);
        submitBtn.classList.toggle('cursor-not-allowed', !isValid);
    }

    emailInput.addEventListener('input', function () {
        const email = this.value;
        const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

        if (email.length > 0) {
            if (isValid) {
                emailIcon.className = 'fas fa-check text-green-500';
                this.classList.remove('border-red-400');
                this.classList.add('border-green-400');
            } else {
                emailIcon.className = 'fas fa-times text-red-500';
                this.classList.remove('border-green-400');
                this.classList.add('border-red-400');
            }
        } else {
            emailIcon.className = 'fas fa-at text-gray-400';
            this.classList.remove('border-red-400', 'border-green-400');
        }

        updateSubmitButton();
    });

    form.addEventListener('submit', function () {
        if (!submitBtn.disabled) {
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75');
        }
    });

    window.toggleEmailInstructions = function () {
        const instructions = document.getElementById('email-instructions');
        instructions.classList.toggle('hidden');
        instructions.classList.add('animate__animated', 'animate__fadeInDown');
    };

    emailInput.focus();
    updateSubmitButton();
});
}