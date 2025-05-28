"use strict";

if (document.body.id === 'payPage') {
        console.log('✅ Script de pago cargado');

    const stripe = Stripe(document.querySelector('meta[name="stripe-key"]').content);
    const stripeUrl = document.querySelector('meta[name="stripe-url"]').content;
    const total = parseFloat(document.querySelector('meta[name="total-amount"]').content);

    const errorContainer = document.getElementById('stripe-error');
    const submitBtn = document.getElementById('submit-button');

    if (submitBtn) {
        submitBtn.addEventListener('click', async function (e) {
            e.preventDefault();
            errorContainer.classList.add('hidden');
            errorContainer.innerText = '';

            const metodo = document.querySelector('input[name="metodo_pago"]:checked')?.value;
            if (!metodo) return;

            if (metodo === 'tarjeta') {
                try {
                    const response = await fetch(stripeUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ amount: total })
                    });

                    const data = await response.json();
                    if (data.id) {
                        stripe.redirectToCheckout({ sessionId: data.id });
                    } else {
                        errorContainer.innerText = data.error || "Error inesperado al procesar el pago.";
                        errorContainer.classList.remove('hidden');
                    }
                } catch (error) {
                    errorContainer.innerText = "Error de red al contactar con Stripe.";
                    errorContainer.classList.remove('hidden');
                }
            }

            if (metodo === 'paypal') {
                document.getElementById('paypal-amount').value = total;
                document.getElementById('paypal-form').submit();
            }
        });
    }
}