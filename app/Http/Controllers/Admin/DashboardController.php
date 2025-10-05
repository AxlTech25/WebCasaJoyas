<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
        'products' => \App\Models\Product::count(),
        'categories' => \App\Models\Category::count(),
        'contacts' => \App\Models\Contact::count(),
        ]);
    }
}