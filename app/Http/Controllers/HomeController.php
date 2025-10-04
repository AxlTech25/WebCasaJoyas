<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $destacados = Product::latest()->take(6)->get();
        return view('home', compact('destacados'));
    }
}
