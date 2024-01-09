<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = trans('main.products');
        $products = Product::with('category')->active()->latest()->paginate(9);
        return view('front.products.index', compact('title', 'products'));
    }

    public function show(Product $product)
    {
        return view('front.products.show', compact('product'));
    }
}
