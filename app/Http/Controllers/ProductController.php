<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $q   = $request->string('q')->toString();
        $cat = $request->string('categoria')->toString(); // collares/pulseras/anillos

        $productos = \App\Models\Product::query()
            ->when($q, fn($qq)=>$qq->where('name','like',"%$q%"))
            ->when($cat, fn($qq)=>$qq->whereHas('categories', fn($c)=>$c->where('slug',$cat)))
            ->paginate(12)->withQueryString();

        return view('productos.index', compact('productos','q'));
    }
    
    public function show($slug)
    {
        $p = Product::where('slug',$slug)->firstOrFail();
        return view('productos.show',['p'=>$p]);
    }
}