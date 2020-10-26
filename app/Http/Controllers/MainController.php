<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('index', compact('products'));
    }

    public function сategories() {
        $сategories = Category::get();
        return view('сategories', compact('сategories'));
    }

    public function product($category, $product = null) {
        return view('product', compact('product', 'category'));
    }

    public function сategory($code) {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }


}
