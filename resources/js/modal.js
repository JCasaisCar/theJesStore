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
                document.getElementById('editProductId').value = data.id;
                document.getElementById('editName').value = data.name;
                document.getElementById('editDescription').value = data.description;
                document.getElementById('editPrice').value = data.price;
                document.getElementById('editCategory').value = data.category_id;
                document.getElementById('editStatus').value = data.status;
                document.getElementById('editStock').value = data.stock;

                // Si tienes un campo de selección de modelo
                if (document.getElementById('editModel')) {
                    document.getElementById('editModel').value = data.model_id;
                }

                // Si tienes un campo de selección de marca (opcional)
                if (document.getElementById('editBrand')) {
                    document.getElementById('editBrand').value = data.brand_id;
                }

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
        // Alternar el estado (activo/inactivo)
        document.getElementById('statusInput').value = currentStatus === 1 ? 0 : 1;
        document.getElementById('statusForm').action = `/admin/productos/${productId}/status`;
        document.getElementById('statusModal').classList.remove('hidden');
    };

    // Abrir el modal de eliminación
    window.openDeleteModal = function (productId) {
        document.getElementById('deleteForm').action = `/admin/productos/${productId}`;
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





    //Admin
        // Modal de pedidos
        window.abrirModalPedidos = function () {
            document.getElementById('modalPedidos').classList.remove('hidden');
        };
    
        window.cerrarModalPedidos = function () {
            document.getElementById('modalPedidos').classList.add('hidden');
        };
    
        window.guardarCambios = function (orderId) {
            const status = document.getElementById(`status-${orderId}`).value;
            const tracking = document.getElementById(`tracking-${orderId}`).value;
    
            fetch(`/admin/pedidos/${orderId}/actualizar`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status, tracking })
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                alert('Error al actualizar el pedido.');
                console.error(error);
            });
        };    
});
