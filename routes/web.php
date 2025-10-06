<?php

<<<<<<< HEAD
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


=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/productos', [ProductController::class,'index'])->name('productos.index');
Route::get('/productos/{slug}', [ProductController::class,'show'])->name('productos.show');

Route::get('/carrito', [CartController::class,'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CartController::class,'add'])->name('carrito.add');
Route::post('/carrito/quitar/{id}', [CartController::class,'remove'])->name('carrito.remove');

Route::view('/tiendas','tiendas')->name('tiendas');
Route::view('/nosotros','nosotros')->name('nosotros');

Route::view('/contacto','contacto')->name('contacto');      // GET (vista)
Route::post('/contacto', [ContactController::class,'send'])->name('contacto.send'); // POST

// --- ADMIN ---
Route::middleware(['auth','can:admin'])
  ->prefix('admin')->name('admin.')
  ->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('productos', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);
    Route::resource('categorias', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::get('contactos', [\App\Http\Controllers\Admin\ContactController::class,'index'])->name('contactos.index');
  });

// Dashboard que usa Breeze después del login
Route::get('/dashboard', fn() =>
  redirect()->route(Gate::allows('admin') ? 'admin.dashboard' : 'home')
)->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // Breeze
>>>>>>> master
