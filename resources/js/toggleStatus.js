export function toggleStatus(productId, currentStatus, buttonElement) {
    const newStatus = !currentStatus;

    fetch(`/admin/productos/${productId}/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status: newStatus })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Cambia el estado del botón sin recargar
            buttonElement.textContent = newStatus ? 'Activo' : 'Inactivo';
            buttonElement.classList.toggle('text-green-600', newStatus);
            buttonElement.classList.toggle('text-red-600', !newStatus);
            buttonElement.dataset.currentStatus = newStatus ? 1 : 0;
        } else {
            alert('Error al cambiar el estado del producto.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al conectar con el servidor.');
    });
}
