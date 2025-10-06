<?php

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
