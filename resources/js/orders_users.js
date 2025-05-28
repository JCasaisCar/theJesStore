"use strict";

document.addEventListener('DOMContentLoaded', () => {
    if (document.body.id === 'ordersUsersPage') {

        function getLangParam() {
            const params = new URLSearchParams(window.location.search);
            return params.get('lang');
        }

        const lang = getLangParam() === 'en' ? 'en' : 'es';

        const labels = {
            ver: lang === 'en' ? 'Show details' : 'Ver detalles',
            ocultar: lang === 'en' ? 'Hide details' : 'Ocultar detalles'
        };

        window.toggleDetails = function (orderId) {
            const details = document.getElementById(`order-details-${orderId}`);
            const icon = document.getElementById(`toggle-icon-${orderId}`);
            const text = document.getElementById(`toggle-text-${orderId}`);

            if (!details || !icon || !text) return;

            details.classList.toggle('hidden');

            if (details.classList.contains('hidden')) {
                icon.style.transform = 'rotate(0deg)';
                text.textContent = labels.ver;
            } else {
                icon.style.transform = 'rotate(180deg)';
                text.textContent = labels.ocultar;
            }
        };
    }
});