<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;

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
    WishlistController
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
// Route::get('/confirm', [ConfirmController::class, 'index'])->name('confirm');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/privacidad')->name('privacidad');
Route::get('/soporte')->name('soporte');
Route::get('/categoria/{slug}')->name('categoria');

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
    Route::middleware(['check.roles:user,restaurant'])->group(function () {
        Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
        Route::post('/contacto/enviar', [ContactoController::class, 'enviarMensaje'])->name('contacto.enviar');
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
Route::get('/confirm', [ConfirmController::class, 'success'])->name('confirm');
Route::post('/paypal/pay', [PaypalController::class, 'pay'])->name('paypal.pay');