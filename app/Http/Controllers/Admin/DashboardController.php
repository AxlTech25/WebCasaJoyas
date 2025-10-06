<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'products'   => Product::count(),
            'categories' => Category::count(),
            'contacts'   => Contact::count(),
        ]);
    }
}
