"use strict";

if (document.body.id === 'contactoPage') {
    const translationsEl = document.getElementById('translations');
    const translations = translationsEl ? JSON.parse(translationsEl.dataset.json) : {};

    const form = document.getElementById('contactForm');
    const telefonoInput = document.getElementById('telefono');
    const asuntoInput = document.getElementById('asunto');
    const mensajeInput = document.getElementById('mensaje');
    const privacidadCheckbox = document.getElementById('privacidad');
    const submitBtn = document.getElementById('submit-btn');
    const progressBar = document.getElementById('progress-bar');
    const progressText = document.getElementById('progress-text');

    const submitText = document.getElementById('submit-text');
    const submitIcon = document.getElementById('submit-icon');

    let validationState = {
        telefono: false,
        asunto: false,
        mensaje: false,
        privacidad: false
    };

    telefonoInput.addEventListener('input', function () {
        const value = this.value.trim();
        const phoneRegex = /^[\+]?[\d\s\-\(\)]{8,15}$/;
        const icon = document.getElementById('telefono-icon');
        const message = document.getElementById('telefono-message');
        const messageText = document.getElementById('telefono-text');

        if (value === '') {
            icon.className = 'fas fa-question text-gray-400';
            message.classList.add('hidden');
            validationState.telefono = true;
        } else if (phoneRegex.test(value.replace(/[\s-]/g, ''))) {
            icon.className = 'fas fa-check text-green-500';
            message.classList.remove('hidden');
            message.className = 'text-xs text-green-600 mt-1 flex items-center';
            messageText.textContent = translations.telefono_valido || 'Teléfono válido';
            validationState.telefono = true;
        } else {
            icon.className = 'fas fa-times text-red-500';
            message.classList.remove('hidden');
            message.className = 'text-xs text-red-600 mt-1 flex items-center';
            messageText.textContent = translations.telefono_formato_invalido || 'Formato de teléfono inválido';
            validationState.telefono = false;
        }
        updateProgress();
    });

    asuntoInput.addEventListener('input', function () {
        const value = this.value.trim();
        const icon = document.getElementById('asunto-icon');
        const message = document.getElementById('asunto-message');
        const messageText = document.getElementById('asunto-text');
        const counter = document.getElementById('asunto-count');

        counter.textContent = value.length;

        if (value.length === 0) {
            icon.className = 'fas fa-question text-gray-400';
            message.classList.add('hidden');
            validationState.asunto = false;
        } else if (value.length < 5) {
            icon.className = 'fas fa-exclamation-triangle text-amber-500';
            message.classList.remove('hidden');
            message.className = 'text-xs text-amber-600 mt-1 flex items-center';
            messageText.textContent = translations.minimo_5_caracteres || 'Mínimo 5 caracteres';
            validationState.asunto = false;
        } else {
            icon.className = 'fas fa-check text-green-500';
            message.classList.remove('hidden');
            message.className = 'text-xs text-green-600 mt-1 flex items-center';
            messageText.textContent = translations.asunto_valido || 'Asunto válido';
            validationState.asunto = true;
        }
        updateProgress();
    });

    mensajeInput.addEventListener('input', function () {
        const value = this.value.trim();
        const icon = document.getElementById('mensaje-icon');
        const message = document.getElementById('mensaje-message');
        const messageText = document.getElementById('mensaje-text');
        const counter = document.getElementById('mensaje-count');

        counter.textContent = value.length;

        if (value.length === 0) {
            icon.className = 'fas fa-question text-gray-400';
            message.classList.add('hidden');
            validationState.mensaje = false;
        } else if (value.length < 20) {
            icon.className = 'fas fa-exclamation-triangle text-amber-500';
            message.classList.remove('hidden');
            message.className = 'text-xs text-amber-600 mt-1 flex items-center';
            messageText.textContent = translations.minimo_20_caracteres || 'Mínimo 20 caracteres';
            validationState.mensaje = false;
        } else {
            icon.className = 'fas fa-check text-green-500';
            message.classList.remove('hidden');
            message.className = 'text-xs text-green-600 mt-1 flex items-center';
            messageText.textContent = translations.mensaje_valido || 'Mensaje válido';
            validationState.mensaje = true;
        }
        updateProgress();
    });

    privacidadCheckbox.addEventListener('change', function () {
        validationState.privacidad = this.checked;
        updateProgress();
    });

    function updateProgress() {
        const totalFields = 4;
        const completedFields = Object.values(validationState).filter(Boolean).length;
        const progress = Math.round((completedFields / totalFields) * 100);

        progressBar.style.width = progress + '%';
        progressText.textContent = progress + '%';

        const allValid = Object.values(validationState).every(Boolean);
        submitBtn.disabled = !allValid;

        if (allValid) {
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            submitBtn.classList.add('hover:scale-105');
        } else {
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.classList.remove('hover:scale-105');
        }
    }

    form.addEventListener('submit', function () {
        submitBtn.disabled = true;
        submitText.textContent = translations.enviando_mensaje || 'Enviando mensaje...';
        submitIcon.className = 'fas fa-spinner fa-spin';
    });

    updateProgress();

    window.toggleFAQ = function (element) {
        const answer = element.nextElementSibling;
        answer.classList.toggle('hidden');
        const icon = element.querySelector('.fa-chevron-down');
        icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    };

    window.openMessagesModal = function () {
        const modal = document.getElementById('messagesModal');
        const content = document.getElementById('messagesContent');
        modal.classList.remove('hidden');
        content.innerHTML = '<p>Cargando mensajes...</p>';

        fetch('/mis-mensajes')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    content.innerHTML = `<p class="text-gray-600">${translations.sin_mensajes ?? 'No has enviado ningún mensaje todavía.'}</p>`;
                    return;
                }

                content.innerHTML = data.map(msg => `
                    <div class="border p-4 rounded-lg bg-gray-50">
                        <p><strong>${translations.asunto}:</strong> ${msg.asunto}</p>
                        <p><strong>${translations.mensaje}:</strong> ${msg.mensaje}</p>
                        <p>
                            <strong>${translations.respuesta}:</strong> 
                            ${msg.answer 
                                ? `${msg.answer} <br><small class="text-gray-500">${translations.respondido_el ?? 'Respondido el'}: ${new Date(msg.updated_at).toLocaleString()}</small>` 
                                : `<em>${translations.sin_respuesta}</em>`}
                        </p>                    
                        <p class="text-sm text-gray-500 mt-2">${translations.enviado_el}: ${new Date(msg.created_at).toLocaleString()}</p>
                    </div>
                `).join('');
            })
            .catch(() => {
                content.innerHTML = '<p class="text-red-500">Hubo un error al cargar los mensajes.</p>';
            });
    };

    window.closeMessagesModal = function () {
        document.getElementById('messagesModal').classList.add('hidden');
    };
}
