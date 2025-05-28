import './bootstrap'; 



import './imagePreview.js';





import './confirmDelete.js'; 

import './modal.js'; 

import './arriba.js';

import './admin.js';

import './cart.js';

import './contacto.js';

import './cookies.js';

import './faq.js';

import './orders_users.js';

import './header-nav.js';

import './toast-handler.js';

import './shipping-form.js';

import './discount-codes.js';

import './pay.js';

import './forgot-password.js';

import './register.js';

import './reset-password.js';

import { toggleStatus } from './toggleStatus.js';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-toggle-status]').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.dataset.productId;
            const currentStatus = button.dataset.currentStatus === "1";
            toggleStatus(productId, currentStatus, button);
        });
    });
});