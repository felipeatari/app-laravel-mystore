<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
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

    public function create()
    {
        return view('admin.products_create');
    }

    public function create_req(ProductStoreRequest $request)
    {
        $inputs = $request->validated();

        $inputs['slug'] = Str::slug($inputs['name']);

        if (!empty($inputs['cover']) && $inputs['cover']->isValid()) {
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        };

        Product::create($inputs);

        return Redirect::route('admin.products');
    }

    public function edit(Product $product)
    {
        return view('admin.products_edit', [
            'product' => $product
        ]);
    }

    public function edit_req(Product $product, ProductStoreRequest $request)
    {
        $inputs = $request->validated();

        $inputs['slug'] = Str::slug($inputs['name']);

        if (!empty($inputs['cover']) && $inputs['cover']->isValid()) {
            if (!empty($product->cover)) Storage::delete($product->cover);
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        };

        $product->fill($inputs);
        $product->save();

        return Redirect::route('admin.products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        if (!empty($product->cover)) Storage::delete($product->cover);

        return Redirect::route('admin.products');
    }

    public function delete_image(Product $product)
    {
        if (!empty($product->cover)) Storage::delete($product->cover);
        $product->cover = null;
        $product->save();

        return Redirect::back();
    }
}
