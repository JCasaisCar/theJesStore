<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountCodeController;
use App\Models\Newsletter;
use App\Http\Controllers\NewsletterAdminController;
use App\Notifications\NewsletterUnsubscribedNotification;
use Illuminate\Support\Facades\Notification;


use App\Models\Category;
use App\Http\Controllers\{
    AdminController,
    AddresController,
    CartController,
    ConfirmController,
    CondicionesUsoController,
    ContactoController,
    CookiesController,
    FaqController,
    HomeController,
    NosotrosController,
    NuestraTiendaController,
    PayController,
    PrivacyController,
    TermsController,
    WishlistController,
    AdminUserController,
    OrdersUsersController,
    InvoiceController
};
use Laravel\Fortify\Http\Controllers\{
    AuthenticatedSessionController,
    NewPasswordController,
    PasswordResetLinkController,
    RegisteredUserController
};

// 🌍 Página de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🌐 Rutas públicas
Route::get('/categories', fn(Request $request) => response()->json(Category::all()));
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');
Route::get('/tienda', [NuestraTiendaController::class, 'index'])->name('tienda');
Route::get('/condiciones', [CondicionesUsoController::class, 'index'])->name('condiciones');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/cookies', [CookiesController::class, 'index'])->name('cookies');
Route::get('/addres', [AddresController::class, 'index'])->name('addres');
Route::get('/pay', [PayController::class, 'index'])->name('pay');
Route::get('/privacidad')->name('privacidad');
Route::get('/soporte')->name('soporte');
Route::get('/categoria/{slug}')->name('categoria');
Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter.subscribe');


// 🧾 Rutas de autenticación Fortify (invitados)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

// 📧 Verificación de email
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/')->with('message', 'Tu correo ha sido verificado correctamente.');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        if (!$request->user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('message', 'Se ha enviado un nuevo correo de verificación.');
        }
        return redirect()->route('home');
    })->middleware('throttle:6,1')->name('verification.send');
});

// 🔒 Rutas autenticadas y verificadas
Route::middleware(['auth', 'verified'])->group(function () {

    


    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Contacto (user y restaurant)
    Route::middleware(['check.roles:user'])->group(function () {
        Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
        Route::post('/contacto', [ContactoController::class, 'store'])->name('contact.store');
        Route::get('/mis-mensajes', [ContactoController::class, 'userMessages'])->middleware('auth');
    });

    // Lista de deseos (user)
    Route::middleware(['check.roles:user'])->group(function () {
        Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    });

    // Carrito (user)
    Route::middleware(['check.roles:user'])->group(function () {
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    });

    // Panel Admin (admin)
    Route::middleware(['check.roles:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/ventas/mensuales', [AdminController::class, 'mensuales']);
        Route::get('/admin/ventas/trimestrales', [AdminController::class, 'trimestrales']);
        Route::get('/admin/ventas/anuales', [AdminController::class, 'anuales']);
        Route::get('/admin/productos-stock', [AdminController::class, 'productosPorStock']);
        Route::post('/admin/contact/answer', [ContactoController::class, 'answer'])->name('contact.answer');
        //Ruta para activar/desactivar un usuario
        Route::post('/admin/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle');
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::post('/admin/users/toggle/{user}', [AdminUserController::class, 'toggle'])->name('admin.users.toggle');




    // Rutas específicas para productos
    Route::prefix('admin/productos')->group(function () {
        // Vista principal de gestión de productos
        Route::get('/', [ProductController::class, 'index'])->name('admin.productos');
        
        // Formulario para crear un nuevo producto
        Route::get('/crear', [ProductController::class, 'create'])->name('admin.productos.create');
        
        // Guardar un nuevo producto
        Route::post('/', [ProductController::class, 'store'])->name('admin.productos.store');
        
        // Obtener datos de productos para AJAX
        Route::get('/listar', [ProductController::class, 'getProducts'])->name('admin.productos.listar');
        
        // Ver detalles de un producto específico
        Route::get('/{producto}', [ProductController::class, 'show'])->name('admin.productos.show');
        
        // Formulario para editar un producto
        Route::get('/{producto}/edit', [ProductController::class, 'edit'])->name('admin.productos.edit');
        
        // Actualizar un producto existente
        Route::put('/{producto}', [ProductController::class, 'update'])->name('admin.productos.update');
        
        // Eliminar un producto
        Route::delete('/{producto}', [ProductController::class, 'destroy'])->name('admin.productos.destroy');
        
        // Cambiar rápidamente el estado de un producto (activar/desactivar)
        Route::patch('/{producto}/estado', [ProductController::class, 'updateStatus'])->name('admin.productos.status');
        
        // Obtener categorías para el formulario dinámico
        Route::get('/categorias/listar', [ProductController::class, 'getCategories'])->name('admin.productos.categorias');
        
        // Obtener modelos para el formulario dinámico
        Route::get('/modelos/listar', [ProductController::class, 'getModels'])->name('admin.productos.modelos');

        Route::put('/{producto}/stock', [ProductController::class, 'updateStock'])->name('admin.productos.updateStock');
            
        Route::patch('/{product}/status', [ProductController::class, 'toggleStatus'])->name('admin.productos.toggleStatus');

        
    });
    });
});

// 🚦 Redirección por rol
Route::get('/home', function () {
    if (!Auth::check()) return redirect('/');

    if (!Auth::user()->email_verified_at) {
        Auth::logout();
        return redirect('/login')->with('message', 'Debes verificar tu correo antes de continuar.');
    }

    return match (Auth::user()->role) {
        'admin' => redirect()->route('admin'),
        'user' => redirect('/'),
        default => redirect('/'),
    };
})->name('home');


Route::post('/addres/store', [AddresController::class, 'store'])->name('addres.store');
Route::post('/stripe/payment', [StripeController::class, 'pay'])->name('stripe.payment');
Route::get('/paypal/redirect', [PaypalController::class, 'redirect'])->name('paypal.redirect');
Route::get('/confirm/success', [ConfirmController::class, 'success'])->name('confirm.success');
Route::get('/confirm', [ConfirmController::class, 'index'])->name('confirm');
Route::post('/paypal/pay', [PaypalController::class, 'pay'])->name('paypal.pay');



Route::get('/admin/pedidos/todos', [AdminController::class, 'getAllOrders'])->name('admin.pedidos.todos');
Route::put('/admin/pedidos/{id}/actualizar', [AdminController::class, 'updateOrder'])->name('admin.pedidos.actualizar');




Route::get('/mis-pedidos', [OrdersUsersController::class, 'index'])->name('orders.index');

// Rutas para códigos de descuento (admin)
Route::prefix('discount_codes')->name('discount_codes.')->group(function () {
    Route::get('/', [DiscountCodeController::class, 'index'])->name('index');
    Route::get('/create', [DiscountCodeController::class, 'create'])->name('create');
    Route::post('/', [DiscountCodeController::class, 'store'])->name('store');
    Route::get('/{discountCode}/edit', [DiscountCodeController::class, 'edit'])->name('edit');
    Route::put('/{discountCode}', [DiscountCodeController::class, 'update'])->name('update');
    Route::patch('/{discountCode}/toggle', [DiscountCodeController::class, 'toggle'])->name('toggle');
});


Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');



Route::get('/factura/{order}', [InvoiceController::class, 'download'])->name('invoice.download')->middleware('auth');





Route::get('/newsletter/unsubscribe', function (Request $request) {
    $email = $request->query('email');

    $suscriptor = Newsletter::where('email', $email)->first();

    if ($suscriptor) {
        $suscriptor->delete();

        // 👉 Enviar notificación de confirmación de baja
        Notification::route('mail', $email)->notify(
            new NewsletterUnsubscribedNotification($email)
        );

        return view('newsletter.unsubscribe-confirmed', ['email' => $email]);
    }

    return view('newsletter.unsubscribe-notfound', ['email' => $email]);
})->name('newsletter.unsubscribe');




Route::get('/admin/newsletter/send', [NewsletterAdminController::class, 'form'])->name('admin.newsletter.form');
    Route::post('/admin/newsletter/send', [NewsletterAdminController::class, 'send'])->name('admin.newsletter.send');






    Route::delete('/wishlist/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');