<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuariosController; 


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

// Registro
Route::get('/register', [UsuariosController::class, 'showRegisterForm'])->name('register');
Route::post('/register-demo', [UsuariosController::class, 'register'])->name('register.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', '\App\Http\Controllers\ProfileController@edit')->name('profile.edit');
    Route::put('/profile', '\App\Http\Controllers\ProfileController@update')->name('profile.update');
});

// Área Admin Demo
Route::prefix('admin-demo')->group(function () {
    Route::get('/', function () {
        return view('admin.demo-dashboard');
    });
    
    Route::get('/eventos', function () {
        // Datos de ejemplo para la vista
        $eventosDemo = [
            (object)[
                'id' => 1,
                'nombre' => 'Concierto de Rock',
                'fecha' => now(),
                'estado' => 'activo',
                'auditorio' => (object)['nombre' => 'Auditorio Nacional'],
                'categoria' => (object)['nombre' => 'Música']
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Festival Jazz',
                'fecha' => now()->addDays(7),
                'estado' => 'activo',
                'auditorio' => (object)['nombre' => 'Plaza de Toros'],
                'categoria' => (object)['nombre' => 'Música']
            ]
        ];
        
        return view('admin.eventos.demo-index', [
            'eventos' => $eventosDemo
        ]);
    });
});

Route::get('/login-demo', function () {
    return view('auth.login-demo');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.demo-dashboard');
    })->name('dashboard');
    
    Route::resource('eventos', \App\Http\Controllers\Admin\EventoController::class);
});

Route::prefix('admin')->group(function () {
    Route::get('/eventos', function () {
        // Datos de prueba directamente en la ruta
        $eventos = [
            (object)[
                'id' => 1,
                'nombre' => 'Concierto de Rock',
                'fecha' => now()->addDays(5),
                'auditorio' => (object)['nombre' => 'Auditorio Nacional'],
                'categoria' => (object)['nombre' => 'Música'],
                'estado' => 'activo'
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Festival de Jazz',
                'fecha' => now()->addDays(10),
                'auditorio' => (object)['nombre' => 'Plaza de Toros'],
                'categoria' => (object)['nombre' => 'Música'],
                'estado' => 'activo'
            ]
        ];
        
        return view('admin.eventos.index', ['eventos' => $eventos]);
    })->name('admin.eventos.index');
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
