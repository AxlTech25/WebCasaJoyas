<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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
Route::get('/admin/contactos', function () {
    $items = \App\Models\Contact::latest()->paginate(20);
    return view('admin.contactos', compact('items'));
})->name('admin.contactos'); // ->middleware('auth');



require __DIR__.'/auth.php'; // Breeze
