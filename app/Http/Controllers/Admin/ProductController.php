<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', ['product' => $product]);
    }

    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->is_accepted = 1;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->is_accepted = 2;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
