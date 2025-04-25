<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CondicionesUsoController;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\NuestraTiendaController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\AddresController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Ruta página de inicio
Route::get('/', function (Request $request) {
    if ($request->has('lang')) {
        App::setLocale($request->query('lang'));
    }
    return view('welcome');
});

// Rutas de autenticación con Fortify (Usuarios invitados)
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

// Rutas de verificación de email
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

// Rutas protegidas (Usuarios autenticados y verificados)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Rutas de horarios y product controller
    Route::middleware(['role:admin'])->group(function () {
        
    });

    // Rutas de contacto (Solo users y restaurants)
    Route::middleware(['role:user,restaurant'])->group(function () {
        Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
        Route::post('/contacto/enviar', [ContactoController::class, 'enviarMensaje'])->name('contacto.enviar');    });
});

// 🌎 Rutas públicas
Route::get('/categories', fn(Request $request) => response()->json(Category::all()));
Route::get('/', [HomeController::class, 'index'])->name(name: 'home');
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');
Route::get('/tienda', [NuestraTiendaController::class, 'index'])->name('tienda');
Route::get('/condiciones', [CondicionesUsoController::class, 'index'])->name(name: 'condiciones');


Route::get('/faq', [FaqController::class, 'index'])->name(name: 'faq');
Route::get('/cart', [CartController::class, 'index'])->name(name: 'cart');
Route::get('/terms', [TermsController::class, 'index'])->name(name: 'terms');
Route::get('/privacy', [PrivacyController::class, 'index'])->name(name: 'privacy');
Route::get('/cookies', [CookiesController::class, 'index'])->name(name: 'cookies');
Route::get('/addres', [AddresController::class, 'index'])->name(name: 'addres');
Route::get('/pay', action: [PayController::class, 'index'])->name(name: 'pay');
Route::get('/confirm', action: [ConfirmController::class, 'index'])->name(name: 'confirm');
Route::get('/admin', action: [AdminController::class, 'index'])->name(name: 'admin');


Route::get('/privacidad')->name(name: 'privacidad');
Route::get('/soporte')->name(name: 'soporte');


// Ruta para mostrar categorías específicas
Route::get('/categoria/{slug}')->name('categoria');


// Redirección login según rol
Route::get('/home', function () {
    if (!Auth::check()) return redirect('/');

    if (!Auth::user()->email_verified_at) {
        Auth::logout();
        return redirect('/login')->with('message', 'Debes verificar tu correo antes de continuar.');
    }

    $role = Auth::user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin'),
        'user' => redirect('/'),
        default => redirect('/'),
    };
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});