document.addEventListener('DOMContentLoaded', () => {
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

                document.getElementById('editProductId').value = data.id;
                document.getElementById('editName').value = data.name;
                document.getElementById('editDescription').value = data.description;
                document.getElementById('editPrice').value = data.price;
                document.getElementById('editCategory').value = data.category_id;
                document.getElementById('editStatus').value = data.status;
                document.getElementById('editStock').value = data.stock;

                if (document.getElementById('editModel')) {
                    document.getElementById('editModel').value = data.model_id;
                }

                if (document.getElementById('editBrand')) {
                    document.getElementById('editBrand').value = data.brand_id;
                }

                if (data.image && document.getElementById('editImagePreview')) {
                    const imageUrl = `/storage/products/${data.image}`;
                    const imagePreview = document.getElementById('editImagePreview');
                    imagePreview.src = imageUrl;
                }

                const form = document.getElementById('editForm');
                form.action = `/admin/productos/${productId}`;

                document.getElementById('editModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un problema al cargar el producto');
            });
    };

    window.previewEditImage = function (input) {
        const file = input.files[0];
        const imagePreview = document.getElementById('editImagePreview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    };

    window.previewNewImage = function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('newImagePreview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Vista previa" class="w-32 h-32 object-cover mt-2">`;
            };
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    };

    window.openStatusModal = function (productId, currentStatus) {
        document.getElementById('statusInput').value = currentStatus === 1 ? 0 : 1;
        document.getElementById('statusForm').action = `/admin/productos/${productId}/status`;
        document.getElementById('statusModal').classList.remove('hidden');
    };

    window.openCreateModal = function () {
        document.getElementById('createModal').classList.remove('hidden');
    };

    window.closeModal = function (modalId) {
        document.getElementById(modalId).classList.add('hidden');
    };

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