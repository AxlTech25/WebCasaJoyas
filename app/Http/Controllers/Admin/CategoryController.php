<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $items = Category::orderBy('name')->paginate(30);
        return view('admin.categories.index', compact('items'));
    }
    public function create() {
        return view('admin.categories.create');
    }
    public function store(Request $r) {
        $data = $r->validate([
            'name'=>'required|max:255',
            'slug'=>'required|max:255|unique:categories,slug',
        ]);
        Category::create($data);
        return redirect()->route('admin.categorias.index')->with('ok','Categoría creada');
    }
    public function edit(Category $categoria) {
        return view('admin.categories.edit', ['c'=>$categoria]);
    }
    public function update(Request $r, Category $categoria) {
        $data = $r->validate([
            'name'=>'required|max:255',
            'slug'=>'required|max:255|unique:categories,slug,'.$categoria->id,
        ]);
        $categoria->update($data);
        return redirect()->route('admin.categorias.index')->with('ok','Categoría actualizada');
    }
    public function destroy(Category $categoria) {
        $categoria->delete();
        return back()->with('ok','Categoría eliminada');
    }
}
