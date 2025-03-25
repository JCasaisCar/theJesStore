<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CondicionesUsoController;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DondeEstamosController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\NuestraEmpresaController;
use App\Http\Controllers\NuestraTiendaController;
use App\Http\Controllers\ScheduleController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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
        Route::post('/contacto/enviar', [ContactoController::class, 'enviarMensaje'])->name('contacto.enviar');
        Route::get('/get-schedule', [ScheduleController::class, 'getSchedule'])->name('get-schedule');
    });
});

// 🌎 Rutas públicas
Route::get('/categories', fn(Request $request) => response()->json(Category::all()));
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');
Route::get('/empresa', [NuestraEmpresaController::class, 'index'])->name('empresa');
Route::get('/tienda', [NuestraTiendaController::class, 'index'])->name('tienda');
Route::get('/ubicacion', [DondeEstamosController::class, 'index'])->name(name: 'ubicacion');
Route::get('/condiciones', [CondicionesUsoController::class, 'index'])->name(name: 'condiciones');


// Redirección login según rol
Route::get('/home', function () {
    if (!Auth::check()) return redirect('/');

    if (!Auth::user()->email_verified_at) {
        Auth::logout();
        return redirect('/login')->with('message', 'Debes verificar tu correo antes de continuar.');
    }

    return Auth::user()->role == 'restaurant' ? redirect()->route('schedules.index1') : redirect('/');
})->name('home');