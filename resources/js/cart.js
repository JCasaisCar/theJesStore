"use strict";
if (document.body.id === 'cartPage') {
    function incrementQuantity(inputId) {
        const input = document.getElementById(inputId);
        const currentValue = parseInt(input.value, 10);
        if (currentValue < 99) { 
            input.value = currentValue + 1;
            updateCartTotals();
        }
    }
    
    function decrementQuantity(inputId) {
        const input = document.getElementById(inputId);
        const currentValue = parseInt(input.value, 10);
        if (currentValue > 1) { 
            input.value = currentValue - 1;
            updateCartTotals();
        }
    }
    
    function removeCartItem(productId) {
        
        if (confirm("{{ __('confirmar_eliminar_producto') }}")) {
            console.log(`Producto ${productId} eliminado del carrito`);
            
            const productsContainer = document.querySelector('.divide-y');
            const productItems = productsContainer.children;
            
            if (productItems.length <= 1) {
                clearCart();
            } else {
                updateCartTotals();
            }
        }
    }
    
    function clearCart() {
        if (confirm("{{ __('confirmar_vaciar_carrito') }}")) {
            document.getElementById('cart-with-items').classList.add('hidden');
            document.getElementById('empty-cart').classList.remove('hidden');
        }
    }
    
    function updateCartTotals() {
        console.log('Actualizando totales del carrito...');
    }
}