document.addEventListener('DOMContentLoaded', () => {
    // Abrir el modal de edición con los datos del producto
    window.openEditModal = function (productId) {
        fetch(`/admin/productos/${productId}/edit`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al cargar el producto');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                // Asignar los valores correctos a los campos del formulario
                document.getElementById('editName').value = data.name;
                document.getElementById('editDescription').value = data.description;
                document.getElementById('editPrice').value = data.price;
                document.getElementById('editStatus').value = data.active;
                document.getElementById('editCategory').value = data.category_id;
                document.getElementById('editProductId').value = data.id;
    
                // Reemplazar :id en la acción del formulario
                const form = document.getElementById('editForm');
                form.action = `/admin/productos/${productId}`;
    
                // Mostrar el modal
                document.getElementById('editModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un problema al cargar el producto');
            });
    };
    

    // Abrir el modal de cambio de estado
    window.openStatusModal = function (productId, currentStatus) {
        document.getElementById('statusInput').value = currentStatus === 1 ? 0 : 1;
        document.getElementById('statusForm').action = '/admin/productos/' + productId + '/status';
        document.getElementById('statusModal').classList.remove('hidden');
    };

    // Abrir el modal de eliminación
    window.openDeleteModal = function (productId) {
        document.getElementById('deleteForm').action = '/admin/productos/' + productId;
        document.getElementById('deleteModal').classList.remove('hidden');
    };

    // Abrir el modal de creación
    window.openCreateModal = function () {
        document.getElementById('createModal').classList.remove('hidden');
    };

    // Función para cerrar cualquier modal
    window.closeModal = function (modalId) {
        document.getElementById(modalId).classList.add('hidden');
    };

    // Vista previa de la imagen al seleccionar un archivo
    window.previewImage = function (event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                imagePreview.innerHTML = `<img src="${reader.result}" alt="Vista previa" class="w-32 h-32 object-cover mt-2">`;
            };
            reader.readAsDataURL(file);
        }
    };
});
