<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuariosController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\AuditorioController; 
use App\Http\Controllers\CategoriaController; 
use App\Http\Controllers\EventoController; 
use App\Http\Controllers\ProfileController; 



Route::get('/', function () { return view('welcome'); })->name('home');

Route::get('/explorar', function () {
    return view('explorar');
})->name('explorar');

Route::get('/artistas/{nombre}', function ($nombre) {
    return view('artistas.detalle', ['nombre' => $nombre]);
})->name('artistas.detalle');

// Rutas de Autenticación (Demo)
Route::get('/login', [UsuariosController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsuariosController::class, 'login'])->name('login.custom');
Route::get('/register', [UsuariosController::class, 'showRegisterForm'])->name('register');
Route::post('/register-demo', [UsuariosController::class, 'register'])->name('register.post');

// Rutas de perfil - ACTUALIZADAS PARA COINCIDIR CON TU CONTROLADOR
Route::middleware(['auth'])->group(function () {
    // Ruta para mostrar el perfil (nueva)
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    
    // Tus rutas originales edit/update se mantienen
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Área Admin - SE MANTIENEN TUS RUTAS ORIGINALES
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('eventos', EventoController::class)->names('admin.eventos');
    Route::resource('usuarios', UsuariosController::class)->names('admin.usuarios');
    Route::resource('auditorios', AuditorioController::class)->names('admin.auditorios');
    Route::resource('categorias', CategoriaController::class)->names('admin.categorias');
    
    // Ruta de perfil admin (nueva)
    Route::get('/perfil', [ProfileController::class, 'show'])->name('admin.perfil');
    Route::get('/perfil/edit', [ProfileController::class, 'edit'])->name('admin.perfil.edit');
    Route::put('/perfil/update', [ProfileController::class, 'update'])->name('admin.perfil.update');
});


Route::post('/artistas/{artista}/comprar', [ArtistaController::class, 'procesarCompra'])->name('artistas.comprar');

Route::get('/usuario/dashboard', function () {
    return view('usuario.dashboard');
})->name('usuario.dashboard');

// Ruta para logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // o la ruta que quieras redirigir después de cerrar sesión
})->name('logout');
