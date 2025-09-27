<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('home');
});

Route::get('/colecciones', function () {
    return "Página de colecciones";
});

Route::prefix('categoria')->group(function () {
    Route::get('/collares', function () {
        return "Página de collares";
    });

    Route::get('/pulseras', function () {
        return "Página de pulseras";
    });

    Route::get('/anillos', function () {
        return "Página de anillos";
    });
});

Route::get('/categoria/collares', function () {
    return view('categoria.collares');
});


Route::prefix('servicios')->group(function () {
    // Sección Más
    Route::get('/acerca', function () {
        return view('mas.acerca');
    });

    Route::get('/contacto', function () {
        return view('mas.contacto');
    });

    Route::get('/servicios', function () {
        return view('mas.servicios');
    });
});

Route::get('/tiendas', function () {
    return "Página de tiendas";
});

Route::get('/mas', function () {
    return "Más información";
});

// Login y Registro
Route::get('/login', function () {
    return "Formulario de Login (por implementar)";
});

Route::get('/register', function () {
    return "Formulario de Registro (por implementar)";
});


// CRUD protegidos con login
Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
});


require __DIR__.'/auth.php';


