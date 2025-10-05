<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q   = $request->string('q')->toString();
        $cat = $request->string('categoria')->toString(); // collares / pulseras / anillos

        $productos = \App\Models\Product::query()
            ->when($q, fn($qq) => $qq->where('name', 'like', "%$q%"))
            // Si tienes relación categories() -> whereHas; si no, hace fallback por nombre
            ->when($cat, function ($qq) use ($cat) {
                if (method_exists(\App\Models\Product::class, 'categories')) {
                    $qq->whereHas('categories', fn($c) => $c->where('slug', $cat));
                } else {
                    $qq->where('name', 'like', "%$cat%");
                }
            })
            ->paginate(12)
            ->withQueryString();

            return view('productos.index', compact('productos','q'));
    }
    
    public function show($slug)
    {
        $p = Product::where('slug',$slug)->firstOrFail();
        return view('productos.show',['p'=>$p]);
    }
}