"use strict";
if (document.body.id === 'addres-page') {
document.addEventListener('DOMContentLoaded', function () {
    const envioOptions = document.querySelectorAll('[name="shipping_method_id"]');

    envioOptions.forEach(option => {
        option.addEventListener('change', function () {
            // Quitar borde azul de todos los contenedores
            document.querySelectorAll('[data-envio-container]').forEach(container => {
                container.classList.remove('border-blue-600');
                container.classList.add('border-gray-300');
            });

            // Activar contenedor seleccionado
            const container = this.closest('[data-envio-container]');
            container.classList.remove('border-gray-300');
            container.classList.add('border-blue-600');

            // Obtener precio desde el contenedor activo
            const precioText = container.querySelector('.font-bold.text-blue-600').textContent;
            const precioEnvio = parseFloat(precioText.replace('€', '').trim().replace(',', '.'));
            const subtotal = parseFloat('{{ $subtotal }}');
            const iva = parseFloat('{{ $iva }}');
            const total = (subtotal + iva + precioEnvio).toFixed(2);

            // Actualizar resumen
            document.querySelectorAll('.space-y-3.mb-6 .font-medium')[1].textContent = precioEnvio.toFixed(2) + ' €';
            document.querySelector('.space-y-3.mb-6 .font-bold.text-blue-600').textContent = total + ' €';
        });
    });

    // Clic en contenedor para seleccionar radio
    document.querySelectorAll('[data-envio-container]').forEach(container => {
        container.addEventListener('click', function () {
            const input = container.querySelector('input[type="radio"]');
            input.checked = true;
            input.dispatchEvent(new Event('change'));
        });
    });
});
}