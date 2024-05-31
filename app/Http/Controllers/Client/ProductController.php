<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('Client.products.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('Client.products.show', ['product' => $product]);
    }

    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->is_accepted = 1;
        $product->save();

        return redirect()->route('Client.products.index');
    }

    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->is_accepted = 2;
        $product->save();

        return redirect()->route('Client.products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('Client.products.index');
    }
}
