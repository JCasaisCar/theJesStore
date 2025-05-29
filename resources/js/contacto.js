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

    window.openMessagesModal = function (page = 1) {
        const modal = document.getElementById('messagesModal');
        const content = document.getElementById('messagesContent');
        
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        
        content.innerHTML = `
            <div class="flex items-center justify-center py-12">
                <div class="relative">
                    <div class="w-16 h-16 border-4 border-blue-200 border-t-blue-600 rounded-full animate-spin"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i class="fas fa-envelope text-blue-600 text-lg animate-pulse"></i>
                    </div>
                </div>
            </div>
        `;

        fetch(`/mis-mensajes?page=${page}`)
            .then(response => response.json())
            .then(data => {
                if (data.data.length === 0) {
                    content.innerHTML = `
                        <div class="text-center py-16">
                            <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-gray-100 mb-6">
                                <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">No hay mensajes</h3>
                            <p class="text-gray-600 max-w-sm mx-auto">
                                ${translations.sin_mensajes ?? 'No has enviado ningún mensaje todavía.'}
                            </p>
                        </div>
                    `;
                    return;
                }

                const messagesHtml = data.data.map(msg => `
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-tag text-white text-sm"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">${msg.asunto}</h3>
                                    <p class="text-sm text-gray-500 flex items-center mt-1">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        ${translations.enviado_el || 'Enviado el'}: ${new Date(msg.created_at).toLocaleString()}
                                    </p>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                ${msg.answer 
    ? `<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
        <i class="fas fa-check-circle mr-1"></i>${translations.respondido || 'Respondido'}
       </span>`
    : `<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
        <i class="fas fa-clock mr-1"></i>${translations.pendiente || 'Pendiente'}
       </span>`
}
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                                <h4 class="text-sm font-semibold text-blue-900 mb-2 flex items-center">
                                    <i class="fas fa-comment mr-2"></i>
                                    ${translations.mensaje || 'Mensaje'}
                                </h4>
                                <p class="text-blue-800 text-sm leading-relaxed">${msg.mensaje}</p>
                            </div>
                            
                            ${msg.answer 
                                ? `<div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                                    <h4 class="text-sm font-semibold text-green-900 mb-2 flex items-center">
                                        <i class="fas fa-reply mr-2"></i>
                                        ${translations.respuesta || 'Respuesta'}
                                    </h4>
                                    <p class="text-green-800 text-sm leading-relaxed mb-2">${msg.answer}</p>
                                    <p class="text-xs text-green-600 flex items-center">
                                        <i class="fas fa-clock mr-1"></i>
                                        ${translations.respondido_el || 'Respondido el'}: ${new Date(msg.updated_at).toLocaleString()}
                                    </p>
                                </div>`
                                : `<div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-lg">
                                    <p class="text-amber-800 text-sm flex items-center">
                                        <i class="fas fa-hourglass-half mr-2"></i>
                                        <em>${translations.sin_respuesta || 'Esperando respuesta...'}</em>
                                    </p>
                                </div>`
                            }
                        </div>
                    </div>
                `).join('');

                content.innerHTML = `
                    <div class="space-y-6">
                        ${messagesHtml}
                    </div>
                `;

                if (data.last_page > 1) {
                    content.innerHTML += renderPremiumPagination(data);
                }
            })
            .catch(() => {
                content.innerHTML = `
                    <div class="text-center py-16">
                        <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-red-100 mb-6">
                            <i class="fas fa-exclamation-triangle text-red-500 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Error al cargar</h3>
                        <p class="text-gray-600 mb-6">Hubo un problema al cargar los mensajes.</p>
                        <button onclick="openMessagesModal(${page})" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-redo mr-2"></i>
                            Reintentar
                        </button>
                    </div>
                `;
            });
    };

    function renderPremiumPagination(data) {
        const current = data.current_page;
        const total = data.last_page;
        const from = data.from || 0;
        const to = data.to || 0;
        const totalItems = data.total || 0;
        
        const startPage = Math.max(1, current - 2);
        const endPage = Math.min(total, current + 2);
        
        let paginationHtml = `
            <div class="bg-white border-t border-gray-200 px-4 py-6 sm:px-6 mt-8 rounded-b-2xl">
                <!-- Mobile pagination -->
                <div class="flex flex-1 justify-between sm:hidden">
                    <button onclick="openMessagesModal(${current - 1})" 
                            ${current === 1 ? 'disabled' : ''} 
                            class="relative inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                        <i class="fas fa-chevron-left mr-2"></i>
                        Anterior
                    </button>
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700">
                        ${current} / ${total}
                    </span>
                    <button onclick="openMessagesModal(${current + 1})" 
                            ${current === total ? 'disabled' : ''} 
                            class="relative ml-3 inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                        Siguiente
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
                
                <!-- Desktop pagination -->
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Mostrando
                            <span class="font-medium text-gray-900">${from}</span>
                            a
                            <span class="font-medium text-gray-900">${to}</span>
                            de
                            <span class="font-medium text-gray-900">${totalItems}</span>
                            resultados
                        </p>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-lg shadow-sm" aria-label="Pagination">
        `;

        paginationHtml += `
            <button onclick="openMessagesModal(${current - 1})" 
                    ${current === 1 ? 'disabled' : ''} 
                    class="relative inline-flex items-center rounded-l-lg px-3 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                <span class="sr-only">Anterior</span>
                <i class="fas fa-chevron-left h-4 w-4"></i>
            </button>
        `;

        if (startPage > 1) {
            paginationHtml += `
                <button onclick="openMessagesModal(1)" 
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 transition-all duration-200">
                    1
                </button>
            `;
            
            if (startPage > 2) {
                paginationHtml += `
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">
                        ...
                    </span>
                `;
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            const isActive = i === current;
            paginationHtml += `
                <button onclick="openMessagesModal(${i})" 
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold transition-all duration-200 ${
                            isActive 
                            ? 'z-10 bg-blue-600 text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 shadow-lg' 
                            : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                        }">
                    ${i}
                </button>
            `;
        }

        if (endPage < total) {
            if (endPage < total - 1) {
                paginationHtml += `
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">
                        ...
                    </span>
                `;
            }
            
            paginationHtml += `
                <button onclick="openMessagesModal(${total})" 
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 transition-all duration-200">
                    ${total}
                </button>
            `;
        }

        paginationHtml += `
                            <button onclick="openMessagesModal(${current + 1})" 
                                    ${current === total ? 'disabled' : ''} 
                                    class="relative inline-flex items-center rounded-r-lg px-3 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200">
                                <span class="sr-only">Siguiente</span>
                                <i class="fas fa-chevron-right h-4 w-4"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        `;

        return paginationHtml;
    }

    window.closeMessagesModal = function () {
        const modal = document.getElementById('messagesModal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };

    document.getElementById('messagesModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeMessagesModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeMessagesModal();
        }
    });
}