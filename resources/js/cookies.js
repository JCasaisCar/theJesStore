"use strict";
if (document.body.id === 'cookiesPage') {
    document.addEventListener('DOMContentLoaded', function() {
        const cookieBanner = document.getElementById('cookie-banner');
        const acceptButton = document.getElementById('accept-cookies');
        const rejectButton = document.getElementById('reject-cookies');
        const customizeButton = document.getElementById('customize-cookies');
        
        // Comprobar si ya se han aceptado las cookies
        const cookiesAccepted = localStorage.getItem('cookies-accepted');
        
        if (cookiesAccepted) {
            cookieBanner.classList.add('hidden');
        }
        
        acceptButton.addEventListener('click', function() {
            localStorage.setItem('cookies-accepted', 'true');
            cookieBanner.classList.add('hidden');
        });
        
        rejectButton.addEventListener('click', function() {
            localStorage.setItem('cookies-accepted', 'necessary');
            cookieBanner.classList.add('hidden');
        });
        
        customizeButton.addEventListener('click', function() {
            window.location.href = "{{ route('cookies') }}";
        });
    });
}