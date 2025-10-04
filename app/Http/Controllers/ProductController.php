<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $productos = Product::search($q)->paginate(12);
        return view('productos.index', compact('productos','q'));
    }
    public function show($slug)
    {
        $p = Product::where('slug',$slug)->firstOrFail();
        return view('productos.show',['p'=>$p]);
    }
}