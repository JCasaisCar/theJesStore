"use strict";
if (document.body.id === 'cartPage') {
    // Funciones para incrementar/decrementar cantidades
    function incrementQuantity(inputId) {
        const input = document.getElementById(inputId);
        const currentValue = parseInt(input.value, 10);
        if (currentValue < 99) { // Máximo 99 unidades
            input.value = currentValue + 1;
            updateCartTotals();
        }
    }
    
    function decrementQuantity(inputId) {
        const input = document.getElementById(inputId);
        const currentValue = parseInt(input.value, 10);
        if (currentValue > 1) { // Mínimo 1 unidad
            input.value = currentValue - 1;
            updateCartTotals();
        }
    }
    
    // Función para eliminar un producto del carrito
    function removeCartItem(productId) {
        // En un caso real, aquí haríamos una petición AJAX
        // Por ahora, simplemente preguntamos y simulamos
        if (confirm("{{ __('confirmar_eliminar_producto') }}")) {
            // Simular eliminación
            console.log(`Producto ${productId} eliminado del carrito`);
            
            // Contar cuántos productos quedan
            const productsContainer = document.querySelector('.divide-y');
            const productItems = productsContainer.children;
            
            // Si solo queda un producto, vaciar todo el carrito
            if (productItems.length <= 1) {
                clearCart();
            } else {
                // Actualizar totales
                updateCartTotals();
            }
        }
    }
    
    // Función para vaciar el carrito
    function clearCart() {
        // En un caso real, aquí haríamos una petición AJAX
        // Por ahora, simplemente confirmamos y simulamos
        if (confirm("{{ __('confirmar_vaciar_carrito') }}")) {
            // Mostrar estado de carrito vacío
            document.getElementById('cart-with-items').classList.add('hidden');
            document.getElementById('empty-cart').classList.remove('hidden');
        }
    }
    
    // Función para actualizar totales del carrito (simulada)
    function updateCartTotals() {
        // En un caso real, esto realizaría un cálculo basado en cantidades y precios
        console.log('Actualizando totales del carrito...');
    }
}