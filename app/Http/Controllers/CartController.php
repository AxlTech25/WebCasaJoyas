<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function index()
{
$cart = session('cart', []);
$ids = array_keys($cart);
$products = Product::whereIn('id',$ids)->get();
$items = [];
$total = 0;
foreach($products as $p){
$qty = $cart[$p->id]['qty'] ?? 0;
$sub = $p->price * $qty;
$total += $sub;
$items[] = compact('p','qty','sub');
}
return view('carrito.index', compact('items','total'));
}
public function add(Request $request, $id)
{
$qty = max(1, (int)$request->input('qty',1));
$cart = session('cart', []);
$cart[$id] = ['qty' => ($cart[$id]['qty'] ?? 0) + $qty];
session(['cart'=>$cart]);
return redirect()->back()->with('ok','Producto agregado al carrito');
}
public function remove(Request $request, $id)
{
$cart = session('cart', []);
unset($cart[$id]);
session(['cart'=>$cart]);
return redirect()->route('carrito.index')->with('ok','Producto eliminado');
}
}