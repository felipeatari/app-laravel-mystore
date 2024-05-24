<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', [
            'products' => $products
        ]);
    }

    public function edit()
    {
        return view('admin.products_edit');
    }

    public function edit_req()
    {
    }

    public function create()
    {
        return view('admin.products_create');
    }

    public function create_req()
    {}
}
