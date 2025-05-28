@extends('layouts.app')

@section('title', 'Gestionar Productos')

@section('content')

<body id="productosPage">
    <div class="relative bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-10 left-1/3 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>
        <div class="container mx-auto px-6 py-20 relative z-10 text-center">
            <div class="max-w-4xl mx-auto">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-emerald-500 to-green-500 rounded-3xl flex items-center justify-center mb-8 shadow-2xl animate-bounce-slow">
                    <i class="fas fa-box-open text-white text-3xl"></i>
                </div>
                <h1 class="text-4xl md:text-6xl font-black mb-4 bg-gradient-to-r from-white via-green-200 to-emerald-200 bg-clip-text text-transparent">
                    {{ __('gestionar') }} <span class="bg-gradient-to-r from-green-300 to-emerald-300 bg-clip-text text-transparent">{{ __('productos') }}</span>
                </h1>
                <p class="text-gray-300 text-xl max-w-2xl mx-auto">{{ __('administra_todos_los_productos_disponibles_en_la_tienda') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-black text-gray-800">{{ __('gestionar_productos') }}</h2>
                <a href="javascript:void(0);" onclick="openCreateModal()" class="bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white font-bold py-2 px-4 rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <i class="fas fa-plus mr-2"></i>{{ __('aniadir_nuevo_producto') }}
                </a>
            </div>

            <div class="mt-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="border-b">
                            <th class="py-3 text-left">ID</th>
                            <th class="py-3 text-left">{{ __('producto') }}</th>
                            <th class="py-3 text-left">{{ __('imagen') }}</th>
                            <th class="py-3 text-left">{{ __('stock') }}</th>
                            <th class="py-3 text-left">{{ __('estado') }}</th>
                            <th class="py-3 text-left">{{ __('acciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3">{{ $product->id }}</td>
                            <td class="py-3">{{ $product->name }}</td>
                            <td class="py-3">
                                @if($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                                @else
                                <span>{{ __('no_disponible') }}</span>
                                @endif
                            </td>
                            <td class="py-3">
                                <form action="{{ route('admin.productos.updateStock', $product) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="stock" value="{{ $product->stock }}" class="border border-gray-300 p-1 rounded">
                                    <button type="submit" class="bg-blue-600 text-white px-2 py-1 rounded">{{ __('actualizar') }}</button>
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
                                <button onclick="openEditModal({{ $product->id }})" class="text-blue-600 hover:text-blue-500">{{ __('editar') }}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6">
    {{ $products->links() }}
</div>
            </div>
        </div>

        <!-- Modal de añadir nuevo producto -->
        <div id="createModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 overflow-y-auto py-10 px-4 hidden">
            <div class="bg-white rounded-lg w-full max-w-2xl mx-auto max-h-[90vh] overflow-y-auto p-6">
                <h3 class="text-xl font-semibold mb-4">{{ __('aniadir_nuevo_producto') }}</h3>

                <!-- Mensaje de respuesta -->
                <div id="responseMessage" class="hidden p-2 mb-4 text-center text-white font-semibold rounded-lg"></div>

                <form id="createProductForm" action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Nombre del producto -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('nombre') }}</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <!-- Descripción del producto -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">{{ __('descripcion') }}</label>
                        <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                    </div>

                    <!-- Precio del producto -->
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">{{ __('precio') }}</label>
                        <input type="number" step="0.01" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <!-- Categoría del producto -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">{{ __('categoria') }}</label>
                        <select name="category_id" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">{{ __('seleccionar_categoria') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Imagen del producto -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">{{ __('imagen') }}</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*" onchange="previewNewImage(event)">
                        <div id="newImagePreview" class="mt-2"></div>
                    </div>

                    <!-- Marca del dispositivo -->
                    <div class="mb-4">
                        <label for="brand_id" class="block text-sm font-medium text-gray-700">{{ __('marca') }}</label>
                        <select name="brand_id" id="brand_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <option value="">{{ __('seleccionar_marca') }}</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="new_brand" id="new_brand" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe una nueva marca">
                    </div>

                    <!-- Modelo del dispositivo -->
                    <div class="mb-4">
                        <label for="model_id" class="block text-sm font-medium text-gray-700">{{ __('modelo') }}</label>
                        <select name="model_id" id="model_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <option value="">{{ __('seleccionar_modelo') }}</option>
                            @foreach ($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="new_model" id="new_model" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe un nuevo modelo">
                    </div>

                    <!-- Stock del producto -->
                    <div class="mb-4">
                        <label for="stock" class="block text-sm font-medium text-gray-700">{{ __('stock') }}</label>
                        <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <!-- Estado del producto -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">{{ __('estado') }}</label>
                        <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="1">{{ __('activo') }}</option>
                            <option value="0">{{ __('inactivo') }}</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('aniadir_producto') }}</button>
                    </div>
                </form>

                <button onclick="closeModal('createModal')" class="text-gray-600 mt-4 block">{{ __('cerrar') }}</button>
            </div>
        </div>



        <!-- Modal para editar -->
        <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 overflow-y-auto py-10 px-4 hidden">
            <div class="bg-white rounded-lg w-full max-w-2xl mx-auto max-h-[90vh] overflow-y-auto p-6">
                <h3 class="text-xl font-semibold mb-4">{{ __('editar_producto') }}</h3>
                <form id="editForm" action="{{ route('admin.productos.update', ':id') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="product_id" id="editProductId">

                    <!-- Nombre del producto -->
                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700">{{ __('nombre') }}</label>
                        <input type="text" name="name" id="editName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <!-- Descripción del producto -->
                    <div class="mb-4">
                        <label for="editDescription" class="block text-sm font-medium text-gray-700">{{ __('descripcion') }}</label>
                        <textarea name="description" id="editDescription" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                    </div>

                    <!-- Precio del producto -->
                    <div class="mb-4">
                        <label for="editPrice" class="block text-sm font-medium text-gray-700">{{ __('precio') }}</label>
                        <input type="number" step="0.01" name="price" id="editPrice" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <!-- Categoría del producto -->
                    <div class="mb-4">
                        <label for="editCategory" class="block text-sm font-medium text-gray-700">{{ __('categoria') }}</label>
                        <select name="category_id" id="editCategory" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">{{ __('seleccionar_categoria') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Marca -->
                    <div class="mb-4">
                        <label for="editBrand" class="block text-sm font-medium text-gray-700">{{ __('marca') }}</label>
                        <select name="brand_id" id="editBrand" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <option value="">{{ __('seleccionar_marca') }}</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="new_brand" id="new_brand" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe una nueva marca">
                    </div>

                    <!-- Modelo -->
                    <div class="mb-4">
                        <label for="editModel" class="block text-sm font-medium text-gray-700">{{ __('modelo') }}</label>
                        <select name="model_id" id="editModel" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <option value="">{{ __('seleccionar_modelo') }}</option>
                            @foreach ($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="new_model" id="new_model" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm" placeholder="O escribe un nuevo modelo">
                    </div>

                    <!-- Stock del producto -->
                    <div class="mb-4">
                        <label for="editStock" class="block text-sm font-medium text-gray-700">{{ __('stock') }}</label>
                        <input type="number" name="stock" id="editStock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <!-- Estado del producto -->
                    <div class="mb-4">
                        <label for="editStatus" class="block text-sm font-medium text-gray-700">{{ __('estado') }}</label>
                        <select name="status" id="editStatus" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="1">{{ __('activo') }}</option>
                            <option value="0">{{ __('inactivo') }}</option>
                        </select>
                    </div>

                    <!-- Imagen actual y nueva -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('imagen_actual') }}</label>
                        <img id="editImagePreview" src="" alt="Vista previa" class="mt-2 w-32 h-32 object-cover rounded border border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="editImage" class="block text-sm font-medium text-gray-700">{{ __('cambiar_imagen') }}</label>
                        <input type="file" name="image" id="editImage" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*" onchange="previewEditImage(this)">
                    </div>



                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('actualizar_producto') }}</button>
                    </div>
                </form>

                <button onclick="closeModal('editModal')" class="text-gray-600 mt-4 block">{{ __('cerrar') }}</button>
            </div>
        </div>

        <!-- Modal de cambio de estado -->
        <div id="statusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 overflow-y-auto py-10 px-4 hidden">
            <div class="bg-white rounded-lg w-full max-w-md mx-auto max-h-[90vh] overflow-y-auto p-6">
                <h3 class="text-xl font-semibold mb-4">{{ __('confirmar_cambio_de_estado') }}</h3>
                <p>{{ __('estas_seguro_de_que_deseas_cambiar_el_estado_del_producto') }}</p>
                <form id="statusForm" method="POST" class="mt-4">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" id="statusInput">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('confirmar') }}</button>
                </form>
                <button onclick="closeModal('statusModal')" class="text-gray-600 mt-4 block">{{ __('cerrar') }}</button>
            </div>
        </div>

        <!-- Modal de eliminación -->
        <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50 overflow-y-auto py-10 px-4 hidden">
            <div class="bg-white rounded-lg w-full max-w-md mx-auto max-h-[90vh] overflow-y-auto p-6">
                <h3 class="text-xl font-semibold mb-4">{{ __('eliminar_producto') }}</h3>
                <p>{{ __('estas_seguro_de_que_deseas_eliminar_este_producto_esta_accion_no_puede_deshacerse') }}</p>
                <form id="deleteForm" method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">{{ __('eliminar_producto') }}</button>
                </form>
                <button onclick="closeModal('deleteModal')" class="text-gray-600 mt-4 block">{{ __('cerrar') }}</button>
            </div>
        </div>
</body>
@endsection