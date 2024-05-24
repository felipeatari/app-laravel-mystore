<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products', [
            'products' => $products
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products_edit', [
            'product' => $product
        ]);
    }

    public function edit_req(Product $product, Request $request)
    {
        $inputs = $request->validate([
            'name' => 'string|required',
            'price' => 'string|required',
            'stock' => 'integer|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|nullable',
        ]);

        $inputs['slug'] = Str::slug($inputs['name']);

        if (!empty($inputs['cover']) && $inputs['cover']->isValid()) {
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        };

        $product->fill($inputs);
        $product->save();

        return Redirect::route('admin.products');
    }

    public function create()
    {
        return view('admin.products_create');
    }

    public function create_req(Request $request)
    {
        $inputs = $request->validate([
            'name' => 'string|required',
            'price' => 'string|required',
            'stock' => 'integer|nullable',
            'cover' => 'file|nullable',
            'description' => 'string|nullable',
        ]);

        $inputs['slug'] = Str::slug($inputs['name']);

        if (!empty($inputs['cover']) && $inputs['cover']->isValid()) {
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        };

        Product::create($inputs);

        return Redirect::route('admin.products');
    }

    public function delete(Product $product)
    {
        $product->delete();

        return Redirect::route('admin.products');
    }
}
