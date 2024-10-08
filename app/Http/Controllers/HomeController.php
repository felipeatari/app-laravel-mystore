<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();
        // dd($products);

        $products->when($request->search, function($query, $value) {
            $query->where('name', 'like', '%' . $value . '%');
        });

        $products = $products->get();

        return view('pages.home', [
            'products' => $products
        ]);
    }
}
