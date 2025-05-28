"use strict";

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('mobile-menu-button')?.addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    document.getElementById('categories-button')?.addEventListener('click', function () {
        const menu = document.getElementById('categories-menu');
        const icon = document.getElementById('categories-icon');
        menu.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    });
});