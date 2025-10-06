<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // GET /admin/productos
    public function index()
    {
        $items = Product::latest()->paginate(20);
        return view('admin.products.index', compact('items'));
    }

    // GET /admin/productos/create
    public function create()
    {
        $cats = Category::orderBy('name')->get();
        return view('admin.products.create', compact('cats'));
    }

    // POST /admin/productos
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|max:255',
            'slug'        => 'required|max:255|unique:products,slug',
            'description' => 'nullable',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'nullable|integer|min:0',
            'images.*'    => 'nullable|image|max:4096',
            'categories'  => 'array'
        ]);

        $p = Product::create([
            'name'        => $data['name'],
            'slug'        => $data['slug'],
            'description' => $data['description'] ?? null,
            'price_cents' => (int) round($data['price'] * 100),
            'stock'       => $data['stock'] ?? 0,
            'images'      => [],
        ]);

        $imgs = [];
        foreach (($request->file('images') ?? []) as $file) {
            $path = $file->store('products', 'public'); // "products/xxx.jpg"
            $imgs[] = $path;
        }
        if ($imgs) {
            $p->update(['images' => $imgs]);
        }

        if (!empty($data['categories'])) {
            $p->categories()->sync($data['categories']);
        }

        return redirect()->route('admin.productos.index')->with('ok', 'Producto creado');
    }

    // GET /admin/productos/{producto}/edit
    public function edit(Product $producto)
    {
        $cats = Category::orderBy('name')->get();
        return view('admin.products.edit', ['p' => $producto, 'cats' => $cats]);
    }

    // PUT/PATCH /admin/productos/{producto}
    public function update(Request $request, Product $producto)
    {
        $data = $request->validate([
            'name'        => 'required|max:255',
            'slug'        => 'required|max:255|unique:products,slug,'.$producto->id,
            'description' => 'nullable',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'nullable|integer|min:0',
            'images.*'    => 'nullable|image|max:4096',
            'categories'  => 'array',
            'remove_images' => 'array' // 👈 importante
        ]);

        // 1) Actualiza campos base
        $producto->update([
            'name'        => $data['name'],
            'slug'        => $data['slug'],
            'description' => $data['description'] ?? null,
            'price_cents' => (int) round($data['price'] * 100),
            'stock'       => $data['stock'] ?? 0,
        ]);

        // 2) Elimina las imágenes marcadas
        $current = $producto->images ?? [];
        $toRemove = collect($request->input('remove_images', []))->map(fn($i) => (int)$i)->all();

        // borra archivos físicos de los índices marcados (si existen)
        foreach ($toRemove as $i) {
            if (isset($current[$i])) {
                Storage::disk('public')->delete($current[$i]); // "products/xxx.jpg"
            }
        }

        // conserva solo las no marcadas, reindexadas
        $kept = collect($current)->filter(function ($path, $i) use ($toRemove) {
            return !in_array($i, $toRemove, true);
        })->values()->all();

        // 3) Sube nuevas imágenes (si las hay)
        foreach (($request->file('images') ?? []) as $file) {
            $path = $file->store('products', 'public'); // => "products/xxx.jpg"
            $kept[] = $path;
        }

        // 4) Guarda arreglo final
        $producto->update(['images' => $kept]);

        // 5) Categorías (si mandaste el select múltiple)
        if (isset($data['categories'])) {
            $producto->categories()->sync($data['categories']);
        }

        return redirect()->route('admin.productos.index')->with('ok', 'Producto actualizado');
    }

    // DELETE /admin/productos/{producto}
    public function destroy(Product $producto)
    {
        $producto->delete();
        return back()->with('ok', 'Producto eliminado');
    }
}
