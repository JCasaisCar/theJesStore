"use strict";

if (document.body.id === 'discount-codes-index') {
window.toggleUsers = function (button, codeId) {
    const row = document.getElementById('users-row-' + codeId);
    row.classList.toggle('hidden');
    const showing = !row.classList.contains('hidden');
    button.textContent = showing ? 'Ocultar Usuarios' : 'Ver Usuarios';
};
}