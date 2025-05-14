@extends('layouts.app')

@section('title', 'Gestionar Productos')

@section('content')
<div class="container mx-auto px-6 py-6">
    <h2 class="text-2xl font-semibold text-gray-800">Gestionar Productos</h2>

    <!-- Botón para abrir el modal de añadir producto -->
<a href="javascript:void(0);" onclick="openCreateModal()" class="text-blue-600 hover:text-blue-500 font-medium transition mt-4">
    <i class="fas fa-plus mr-1"></i> Añadir Nuevo Producto
</a>

    <div class="mt-6">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="border-b">
                    <th class="py-3 text-left">ID</th>
                    <th class="py-3 text-left">Producto</th>
                    <th class="py-3 text-left">Imagen</th>
                    <th class="py-3 text-left">Stock</th>
                    <th class="py-3 text-left">Estado</th>
                    <th class="py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="py-3">{{ $product->id }}</td>
                    <td class="py-3">{{ $product->name }}</td>
                    <td class="py-3">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                        @else
                            <span>No disponible</span>
                        @endif
                    </td>
                    <td class="py-3">
                    <form action="{{ route('admin.productos.updateStock', $product) }}" method="POST">
                    @csrf
                            @method('PUT')
                            <input type="number" name="stock" value="{{ $product->stock }}" class="border border-gray-300 p-1 rounded">
                            <button type="submit" class="bg-blue-600 text-white px-2 py-1 rounded">Actualizar</button>
                        </form>
                    </td>
                    <td class="py-3">
                        <button
                            type="button"
                            class="text-sm font-medium transition {{ $product->active ? 'text-green-600' : 'text-red-600' }}"
                            onclick="openStatusModal({{ $product->id }}, {{ $product->active }})">
                            {{ $product->active ? 'Activo' : 'Inactivo' }}
                        </button>
                    </td>
                    <td class="py-3">
                        <button onclick="openEditModal({{ $product->id }})" class="text-blue-600 hover:text-blue-500">Editar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de añadir nuevo producto -->
<div id="createModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h3 class="text-xl font-semibold mb-4">Añadir Nuevo Producto</h3>
        
        <!-- Mensaje de respuesta -->
        <div id="responseMessage" class="hidden p-2 mb-4 text-center text-white font-semibold rounded-lg"></div>
        
        <form id="createProductForm" action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nombre del producto -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Descripción del producto -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
            </div>

            <!-- Precio del producto -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" step="0.01" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Categoría del producto -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="category_id" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccionar categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Imagen del producto -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
            </div>

            <!-- Marca del dispositivo -->
            <div class="mb-4">
                <label for="brand_id" class="block text-sm font-medium text-gray-700">Marca</label>
                <select name="brand_id" id="brand_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Seleccionar marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="new_brand" id="new_brand" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe una nueva marca">
            </div>

            <!-- Modelo del dispositivo -->
            <div class="mb-4">
                <label for="model_id" class="block text-sm font-medium text-gray-700">Modelo</label>
                <select name="model_id" id="model_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Seleccionar modelo</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="new_model" id="new_model" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe un nuevo modelo">
            </div>

            <!-- Stock del producto -->
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Estado del producto -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Añadir Producto</button>
            </div>
        </form>
        
        <button onclick="closeModal('createModal')" class="text-gray-600 mt-4 block">Cerrar</button>
    </div>
</div>



<!-- Modal para editar -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h3 class="text-xl font-semibold mb-4">Editar Producto</h3>
        <form id="editForm" action="{{ route('admin.productos.update', ':id') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="product_id" id="editProductId">
            
            <!-- Nombre del producto -->
            <div class="mb-4">
                <label for="editName" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="editName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Descripción del producto -->
            <div class="mb-4">
                <label for="editDescription" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="editDescription" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
            </div>

            <!-- Precio del producto -->
            <div class="mb-4">
                <label for="editPrice" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" step="0.01" name="price" id="editPrice" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Categoría del producto -->
            <div class="mb-4">
                <label for="editCategory" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="category_id" id="editCategory" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccionar categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Marca -->
            <div class="mb-4">
                <label for="editBrand" class="block text-sm font-medium text-gray-700">Marca</label>
                <select name="brand_id" id="editBrand" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Seleccionar marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="new_brand" id="new_brand" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe una nueva marca">
            </div>

            <!-- Modelo -->
            <div class="mb-4">
                <label for="editModel" class="block text-sm font-medium text-gray-700">Modelo</label>
                <select name="model_id" id="editModel" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Seleccionar modelo</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="new_model" id="new_model" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe un nuevo modelo">
            </div>

            <!-- Stock del producto -->
            <div class="mb-4">
                <label for="editStock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="editStock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Estado del producto -->
            <div class="mb-4">
                <label for="editStatus" class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="status" id="editStatus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>


            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar Producto</button>
            </div>
        </form>
        
        <button onclick="closeModal('editModal')" class="text-gray-600 mt-4 block">Cerrar</button>
    </div>
</div>

<!-- Modal de cambio de estado -->
<div id="statusModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h3 class="text-xl font-semibold mb-4">Confirmar cambio de estado</h3>
        <p>¿Estás seguro de que deseas cambiar el estado del producto?</p>
        <form id="statusForm" method="POST" class="mt-4">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" id="statusInput">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Confirmar</button>
        </form>
        <button onclick="closeModal('statusModal')" class="text-gray-600 mt-4 block">Cerrar</button>
    </div>
</div>

<!-- Modal de eliminación -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h3 class="text-xl font-semibold mb-4">Eliminar Producto</h3>
        <p>¿Estás seguro de que deseas eliminar este producto? Esta acción no puede deshacerse.</p>
        <form id="deleteForm" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar Producto</button>
        </form>
        <button onclick="closeModal('deleteModal')" class="text-gray-600 mt-4 block">Cerrar</button>
    </div>
</div>
@endsection
