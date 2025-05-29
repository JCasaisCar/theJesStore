"use strict";

if (document.body.id === 'addres-page') {
    const form = document.getElementById('shipping-form');
    const submitBtn = document.querySelector('button[type="submit"][form="shipping-form"]');
    
    if (!form || !submitBtn) {
        console.error('Form or submit button not found');
    } else {
        const originalSubmitText = submitBtn.innerHTML;

    let validationState = {
        nombre: false,
        apellidos: false,
        telefono: false,
        direccion: false,
        ciudad: false,
        provincia: false,
        codigo_postal: false,
        pais: false
    };

    function createProgressBar() {
        const progressSection = document.createElement('div');
        progressSection.className = 'mb-8 p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-100';
        progressSection.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <span class="text-sm font-bold text-gray-700 flex items-center">
                    <i class="fas fa-tasks mr-2 text-blue-600"></i>
                    Progreso del formulario
                </span>
                <span id="progress-text" class="text-sm font-bold text-blue-600">0%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                <div id="progress-bar" class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 h-3 rounded-full transition-all duration-700 ease-out transform origin-left" style="width: 0%"></div>
            </div>
            <div class="mt-2 text-xs text-gray-600 flex items-center">
                <i class="fas fa-info-circle mr-1"></i>
                <span id="progress-status">Completa todos los campos para continuar</span>
            </div>
        `;
        
        const firstSection = form.querySelector('.mb-8');
        firstSection.parentElement.insertBefore(progressSection, firstSection);
    }

    function enhanceFieldWithValidation(fieldId, validationFn, placeholder = '') {
        const input = document.getElementById(fieldId);
        if (!input) return;

        const container = input.parentElement;
        const label = container.previousElementSibling;
        
        input.classList.add('pr-12', 'transition-all', 'duration-300');
        if (placeholder) input.placeholder = placeholder;

        const iconContainer = document.createElement('div');
        iconContainer.className = 'absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none';
        iconContainer.innerHTML = '<i class="fas fa-circle text-gray-300 text-sm"></i>';
        
        const messageContainer = document.createElement('div');
        messageContainer.className = 'validation-message text-xs mt-2 flex items-center opacity-0 transform translate-y-1 transition-all duration-300';
        
        container.classList.add('relative');
        container.appendChild(iconContainer);
        container.parentElement.appendChild(messageContainer);

        input.addEventListener('focus', function() {
            this.classList.add('ring-4', 'ring-blue-100', 'border-blue-400', 'shadow-lg');
            this.classList.remove('border-gray-300');
        });

        input.addEventListener('blur', function() {
            this.classList.remove('ring-4', 'ring-blue-100', 'shadow-lg');
            if (!validationState[fieldId]) {
                this.classList.remove('border-blue-400');
                this.classList.add('border-gray-300');
            }
        });

        input.addEventListener('input', function() {
            const result = validationFn(this.value.trim());
            updateFieldValidation(fieldId, input, iconContainer, messageContainer, result);
        });

        const initialResult = validationFn(input.value.trim());
        updateFieldValidation(fieldId, input, iconContainer, messageContainer, initialResult);
    }

    function updateFieldValidation(fieldId, input, iconContainer, messageContainer, result) {
        validationState[fieldId] = result.valid;

        input.classList.remove('border-red-300', 'border-green-400', 'border-amber-300', 'border-gray-300');
        input.classList.remove('bg-red-50', 'bg-green-50', 'bg-amber-50');

        if (result.valid) {
            input.classList.add('border-green-400', 'bg-green-50');
        } else if (input.value.trim() !== '') {
            input.classList.add('border-red-300', 'bg-red-50');
        } else {
            input.classList.add('border-gray-300');
        }

        iconContainer.style.transform = 'scale(0.8)';
        setTimeout(() => {
            iconContainer.innerHTML = result.icon;
            iconContainer.style.transform = 'scale(1.1)';
            setTimeout(() => {
                iconContainer.style.transform = 'scale(1)';
            }, 150);
        }, 100);

        if (result.message) {
            messageContainer.innerHTML = `<i class="fas fa-circle mr-2 text-xs"></i><span>${result.message}</span>`;
            messageContainer.className = `validation-message text-xs mt-2 flex items-center transition-all duration-300 ${result.messageClass}`;
            messageContainer.style.opacity = '1';
            messageContainer.style.transform = 'translateY(0)';
        } else {
            messageContainer.style.opacity = '0';
            messageContainer.style.transform = 'translateY(-4px)';
        }

        updateProgress();
    }

    const validations = {
        nombre: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-user text-gray-400"></i>', message: '', messageClass: '' };
            if (value.length < 2) return { valid: false, icon: '<i class="fas fa-exclamation-triangle text-amber-500 animate-pulse"></i>', message: 'Mínimo 2 caracteres', messageClass: 'text-amber-600' };
            if (!/^[a-zA-ZÀ-ÿ\s]{2,}$/.test(value)) return { valid: false, icon: '<i class="fas fa-times text-red-500"></i>', message: 'Solo letras y espacios', messageClass: 'text-red-600' };
            return { valid: true, icon: '<i class="fas fa-check-circle text-green-500"></i>', message: '¡Perfecto!', messageClass: 'text-green-600' };
        },

        apellidos: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-user-tag text-gray-400"></i>', message: '', messageClass: '' };
            if (value.length < 2) return { valid: false, icon: '<i class="fas fa-exclamation-triangle text-amber-500 animate-pulse"></i>', message: 'Mínimo 2 caracteres', messageClass: 'text-amber-600' };
            if (!/^[a-zA-ZÀ-ÿ\s]{2,}$/.test(value)) return { valid: false, icon: '<i class="fas fa-times text-red-500"></i>', message: 'Solo letras y espacios', messageClass: 'text-red-600' };
            return { valid: true, icon: '<i class="fas fa-check-circle text-green-500"></i>', message: '¡Excelente!', messageClass: 'text-green-600' };
        },

        telefono: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-phone text-gray-400"></i>', message: '', messageClass: '' };
            const phoneRegex = /^[\+]?[\d\s\-\(\)]{8,15}$/;
            if (!phoneRegex.test(value.replace(/[\s-]/g, ''))) return { valid: false, icon: '<i class="fas fa-phone-slash text-red-500"></i>', message: 'Formato: +34 123 456 789', messageClass: 'text-red-600' };
            return { valid: true, icon: '<i class="fas fa-phone-check text-green-500"></i>', message: 'Teléfono válido', messageClass: 'text-green-600' };
        },

        direccion: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-map-marker-alt text-gray-400"></i>', message: '', messageClass: '' };
            if (value.length < 5) return { valid: false, icon: '<i class="fas fa-exclamation-triangle text-amber-500 animate-pulse"></i>', message: 'Dirección muy corta', messageClass: 'text-amber-600' };
            return { valid: true, icon: '<i class="fas fa-map-marked-alt text-green-500"></i>', message: 'Dirección válida', messageClass: 'text-green-600' };
        },

        ciudad: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-city text-gray-400"></i>', message: '', messageClass: '' };
            if (value.length < 2) return { valid: false, icon: '<i class="fas fa-exclamation-triangle text-amber-500 animate-pulse"></i>', message: 'Mínimo 2 caracteres', messageClass: 'text-amber-600' };
            if (!/^[a-zA-ZÀ-ÿ\s\-\.]{2,}$/.test(value)) return { valid: false, icon: '<i class="fas fa-times text-red-500"></i>', message: 'Formato de ciudad inválido', messageClass: 'text-red-600' };
            return { valid: true, icon: '<i class="fas fa-city text-green-500"></i>', message: 'Ciudad válida', messageClass: 'text-green-600' };
        },

        provincia: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-map text-gray-400"></i>', message: '', messageClass: '' };
            if (value.length < 2) return { valid: false, icon: '<i class="fas fa-exclamation-triangle text-amber-500 animate-pulse"></i>', message: 'Mínimo 2 caracteres', messageClass: 'text-amber-600' };
            if (!/^[a-zA-ZÀ-ÿ\s\-\.]{2,}$/.test(value)) return { valid: false, icon: '<i class="fas fa-times text-red-500"></i>', message: 'Formato de provincia inválido', messageClass: 'text-red-600' };
            return { valid: true, icon: '<i class="fas fa-map-check text-green-500"></i>', message: 'Provincia válida', messageClass: 'text-green-600' };
        },

        codigo_postal: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-mailbox text-gray-400"></i>', message: '', messageClass: '' };
            
            const pais = document.getElementById('pais').value;
            const formats = {
                'ES': { regex: /^[0-9]{5}$/, example: '41001' },
                'PT': { regex: /^[0-9]{4}-[0-9]{3}$/, example: '1000-001' },
                'FR': { regex: /^[0-9]{5}$/, example: '75001' },
                'IT': { regex: /^[0-9]{5}$/, example: '00118' },
                'DE': { regex: /^[0-9]{5}$/, example: '10115' }
            };
            
            const format = formats[pais] || { regex: /^[0-9A-Za-z\s\-]{3,10}$/, example: '12345' };
            
            if (!format.regex.test(value)) return { valid: false, icon: '<i class="fas fa-times text-red-500"></i>', message: `Formato: ${format.example}`, messageClass: 'text-red-600' };
            return { valid: true, icon: '<i class="fas fa-check-circle text-green-500"></i>', message: 'Código postal válido', messageClass: 'text-green-600' };
        },

        pais: (value) => {
            if (!value) return { valid: false, icon: '<i class="fas fa-globe text-gray-400"></i>', message: '', messageClass: '' };
            return { valid: true, icon: '<i class="fas fa-flag text-green-500"></i>', message: 'País seleccionado', messageClass: 'text-green-600' };
        }
    };

    function updateProgress() {
        const totalFields = Object.keys(validationState).length;
        const validFields = Object.values(validationState).filter(Boolean).length;
        const progress = Math.round((validFields / totalFields) * 100);
        
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const progressStatus = document.getElementById('progress-status');
        
        if (progressBar && progressText && progressStatus) {
            progressBar.style.width = progress + '%';
            progressText.textContent = progress + '%';
            
            progressBar.classList.remove('from-red-400', 'via-red-500', 'to-red-600');
            progressBar.classList.remove('from-amber-400', 'via-amber-500', 'to-amber-600');
            progressBar.classList.remove('from-blue-400', 'via-blue-500', 'to-purple-600');
            progressBar.classList.remove('from-green-400', 'via-green-500', 'to-green-600');
            
            if (progress === 100) {
                progressBar.classList.add('from-green-400', 'via-green-500', 'to-green-600');
                progressStatus.innerHTML = '<i class="fas fa-check-circle mr-1 text-green-600"></i>¡Formulario completo! Listo para continuar';
                progressStatus.classList.add('text-green-600');
            } else if (progress >= 75) {
                progressBar.classList.add('from-blue-400', 'via-blue-500', 'to-purple-600');
                progressStatus.innerHTML = '<i class="fas fa-battery-three-quarters mr-1 text-blue-600"></i>¡Casi terminado!';
                progressStatus.classList.remove('text-green-600');
            } else if (progress >= 50) {
                progressBar.classList.add('from-amber-400', 'via-amber-500', 'to-amber-600');
                progressStatus.innerHTML = '<i class="fas fa-battery-half mr-1 text-amber-600"></i>Vas por la mitad';
                progressStatus.classList.remove('text-green-600');
            } else if (progress > 0) {
                progressBar.classList.add('from-red-400', 'via-red-500', 'to-red-600');
                progressStatus.innerHTML = '<i class="fas fa-battery-quarter mr-1 text-red-600"></i>Sigue completando los campos';
                progressStatus.classList.remove('text-green-600');
            }
        }
        
        updateSubmitButton(progress === 100);
    }

    function updateSubmitButton(isValid) {
        if (isValid) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'from-gray-400', 'to-gray-500');
            submitBtn.classList.add('from-blue-800', 'to-blue-600', 'hover:from-blue-700', 'hover:to-blue-500', 'transform', 'hover:scale-105', 'shadow-lg', 'hover:shadow-xl');
            submitBtn.innerHTML = originalSubmitText;
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed', 'from-gray-400', 'to-gray-500');
            submitBtn.classList.remove('from-blue-800', 'to-blue-600', 'hover:from-blue-700', 'hover:to-blue-500', 'transform', 'hover:scale-105', 'shadow-lg', 'hover:shadow-xl');
        }
    }

    function enhanceSelectValidation() {
        const paisSelect = document.getElementById('pais');
        if (!paisSelect) return;
        
        const container = paisSelect.parentElement;
        
        const iconContainer = document.createElement('div');
        iconContainer.className = 'absolute inset-y-0 right-8 pr-3 flex items-center pointer-events-none';
        iconContainer.innerHTML = '<i class="fas fa-globe text-gray-400"></i>';
        
        const messageContainer = document.createElement('div');
        messageContainer.className = 'validation-message text-xs mt-2 flex items-center opacity-0 transition-all duration-300';
        
        container.classList.add('relative');
        container.appendChild(iconContainer);
        container.parentElement.appendChild(messageContainer);
        
        paisSelect.classList.add('pr-12', 'transition-all', 'duration-300');
        
        paisSelect.addEventListener('change', function() {
            const result = validations.pais(this.value);
            updateFieldValidation('pais', paisSelect, iconContainer, messageContainer, result);
            
            const codigoPostalInput = document.getElementById('codigo_postal');
            if (codigoPostalInput && codigoPostalInput.value.trim()) {
                const cpContainer = codigoPostalInput.parentElement;
                const cpIconContainer = cpContainer.querySelector('.absolute');
                const cpMessageContainer = cpContainer.parentElement.querySelector('.validation-message');
                if (cpIconContainer && cpMessageContainer) {
                    const cpResult = validations.codigo_postal(codigoPostalInput.value.trim());
                    updateFieldValidation('codigo_postal', codigoPostalInput, cpIconContainer, cpMessageContainer, cpResult);
                }
            }
        });
        
        if (paisSelect.value) {
            const result = validations.pais(paisSelect.value);
            updateFieldValidation('pais', paisSelect, iconContainer, messageContainer, result);
        }
    }

    function init() {
        createProgressBar();
        
        enhanceFieldWithValidation('nombre', validations.nombre, 'Ej: Juan');
        enhanceFieldWithValidation('apellidos', validations.apellidos, 'Ej: García López');
        enhanceFieldWithValidation('telefono', validations.telefono, '+34 123 456 789');
        enhanceFieldWithValidation('direccion', validations.direccion, 'Calle, número, piso...');
        enhanceFieldWithValidation('ciudad', validations.ciudad, 'Ej: Sevilla');
        enhanceFieldWithValidation('provincia', validations.provincia, 'Ej: Andalucía');
        enhanceFieldWithValidation('codigo_postal', validations.codigo_postal, 'Ej: 41001');
        
        enhanceSelectValidation();
        
        handleShippingMethods();
        
        form.addEventListener('submit', function(e) {
            const allValid = Object.values(validationState).every(Boolean);
            
            if (!allValid) {
                e.preventDefault();
                
                showErrorNotification();
                
                focusFirstInvalidField();
            } else {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Procesando...';
                submitBtn.disabled = true;
            }
        });
        
        updateProgress();
    }

    function handleShippingMethods() {
        const shippingMethodInputs = document.querySelectorAll('input[name="shipping_method_id"]');
        const envioPrice = document.querySelector('[data-envio]');
        const totalPrice = document.querySelector('[data-total]');
        const subtotalEl = document.querySelector('[data-subtotal]');
        const ivaEl = document.querySelector('[data-iva]');
        
        if (!shippingMethodInputs.length || !envioPrice || !totalPrice || !subtotalEl || !ivaEl) {
            return;
        }
        
        const subtotal = parseFloat(subtotalEl.dataset.subtotal);
        const iva = parseFloat(ivaEl.dataset.iva);

        shippingMethodInputs.forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('[data-envio-container]').forEach(container => {
                    container.classList.remove('border-blue-600', 'bg-blue-50');
                    container.classList.add('border-gray-300');
                });
                
                const selectedContainer = this.closest('[data-envio-container]');
                if (selectedContainer) {
                    selectedContainer.classList.remove('border-gray-300');
                    selectedContainer.classList.add('border-blue-600', 'bg-blue-50');
                }
                
                const priceElement = this.closest('label').querySelector('.font-bold');
                if (priceElement) {
                    const shippingPrice = parseFloat(priceElement.textContent.replace('€', '').trim());
                    const newTotal = subtotal + shippingPrice + iva;
                    
                    envioPrice.textContent = shippingPrice.toFixed(2) + ' €';
                    totalPrice.textContent = newTotal.toFixed(2) + ' €';
                }
            });
        });
    }

    function showErrorNotification() {
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-4 rounded-lg shadow-2xl z-50 transform translate-x-full transition-transform duration-500';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-3"></i>
                <span>Por favor, completa todos los campos correctamente</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-3 text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 500);
        }, 4000);
    }

    function focusFirstInvalidField() {
        const firstInvalidField = Object.keys(validationState).find(field => !validationState[field]);
        if (firstInvalidField) {
            const fieldElement = document.getElementById(firstInvalidField);
            if (fieldElement) {
                fieldElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                fieldElement.focus();
            }
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    }
}