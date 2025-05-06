"use strict";
if (document.body.id === 'contactoPage') {
    
    // =======================
    // FUNCIONES DE MODALES
    // =======================
    
    window.toggleFAQ = function(element) {
        // Buscar el elemento de respuesta adyacente
        const answer = element.nextElementSibling;
        
        // Alternar visibilidad
        answer.classList.toggle('hidden');
        
        // Rotar el icono
        const icon = element.querySelector('.fa-chevron-down');
        if (answer.classList.contains('hidden')) {
            icon.style.transform = 'rotate(0deg)';
        } else {
            icon.style.transform = 'rotate(180deg)';
        }
    };

    window.openMessagesModal = function() {
        const modal = document.getElementById('messagesModal');
        const content = document.getElementById('messagesContent');
        modal.classList.remove('hidden');
        content.innerHTML = '<p>Cargando mensajes...</p>';

        fetch('http://127.0.0.1:8000/mis-mensajes')
            .then(response => response.json())
            .then(data => {
                if (data.length === 0) {
                    content.innerHTML = '<p class="text-gray-600">No has enviado ningún mensaje todavía.</p>';
                    return;
                }

                content.innerHTML = data.map(msg => `
                    <div class="border p-4 rounded-lg bg-gray-50">
                        <p><strong>Asunto:</strong> ${msg.asunto}</p>
                        <p><strong>Mensaje:</strong> ${msg.mensaje}</p>
                        <p>
                        <strong>Respuesta:</strong> 
                        ${msg.answer 
                            ? `${msg.answer} <br><small class="text-gray-500">Respondido el: ${new Date(msg.updated_at).toLocaleString()}</small>` 
                            : '<em>Aún sin respuesta</em>'}
                        </p>                    
                        <p class="text-sm text-gray-500 mt-2">Enviado el: ${new Date(msg.created_at).toLocaleString()}</p>
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
