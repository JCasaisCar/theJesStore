"use strict";
if (document.body.id === 'contactoPage') {
    const translationsEl = document.getElementById('translations');
    const translations = translationsEl ? JSON.parse(translationsEl.dataset.json) : {};

    window.toggleFAQ = function(element) {
        const answer = element.nextElementSibling;
        answer.classList.toggle('hidden');
        const icon = element.querySelector('.fa-chevron-down');
        icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    };

    window.openMessagesModal = function() {
        const modal = document.getElementById('messagesModal');
        const content = document.getElementById('messagesContent');
        modal.classList.remove('hidden');
        content.innerHTML = '<p>Cargando mensajes...</p>';

        fetch('http://localhost:8000/mis-mensajes')
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

    window.closeMessagesModal = function() {
        document.getElementById('messagesModal').classList.add('hidden');
    };
}