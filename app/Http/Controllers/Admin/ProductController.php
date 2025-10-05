<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;   // <- importa el Controller base
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::latest()->paginate(20);
        return view('admin.products.index', compact('items'));
    }

    public function create()
    {
        $cats = Category::orderBy('name')->get();
        return view('admin.products.create', compact('cats'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name'       => 'required|max:255',
            'slug'       => 'required|max:255|unique:products,slug',
            'description'=> 'nullable',
            'price'      => 'required|numeric|min:0',
            'stock'      => 'nullable|integer|min:0',
            'images.*'   => 'nullable|image|max:4096',
            'categories' => 'array'
        ]);

        $imgs = [];
        foreach (($r->file('images') ?? []) as $file) {
            $imgs[] = Storage::url($file->store('products', 'public'));
        }

        $p = Product::create([
            'name'        => $data['name'],
            'slug'        => $data['slug'],
            'description' => $data['description'] ?? null,
            'price_cents' => (int) round($data['price'] * 100),
            'stock'       => $data['stock'] ?? 0,
            'images'      => $imgs,
        ]);

        if (!empty($data['categories'])) {
            $p->categories()->sync($data['categories']);
        }

        return redirect()->route('admin.productos.index')->with('ok', 'Producto creado');
    }

    public function edit(Product $producto)
    {
        $cats = Category::orderBy('name')->get();
        return view('admin.products.edit', ['p' => $producto, 'cats' => $cats]);
    }

    public function update(Request $r, Product $producto)
    {
        $data = $r->validate([
            'name'       => 'required|max:255',
            'slug'       => 'required|max:255|unique:products,slug,' . $producto->id,
            'description'=> 'nullable',
            'price'      => 'required|numeric|min:0',
            'stock'      => 'nullable|integer|min:0',
            'images.*'   => 'nullable|image|max:4096',
            'categories' => 'array'
        ]);

        $imgs = $producto->images ?? [];
        foreach (($r->file('images') ?? []) as $file) {
            $imgs[] = Storage::url($file->store('products', 'public'));
        }

        $producto->update([
            'name'        => $data['name'],
            'slug'        => $data['slug'],
            'description' => $data['description'] ?? null,
            'price_cents' => (int) round($data['price'] * 100),
            'stock'       => $data['stock'] ?? 0,
            'images'      => $imgs,
        ]);

        if (isset($data['categories'])) {
            $producto->categories()->sync($data['categories']);
        }

        return redirect()->route('admin.productos.index')->with('ok', 'Producto actualizado');
    }

    public function destroy(Product $producto)
    {
        $producto->delete();
        return back()->with('ok', 'Producto eliminado');
    }
}
