<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request) {
        $productsQuery = Product::with('category');

        if($request->filled('price_from')){
            $productsQuery->where('price','>=', $request->price_from);
        }

        if($request->filled('price_to')){
            $productsQuery->where('price','<=', $request->price_to);
        }

        foreach (['hit' , 'new' , 'recommend'] as $field){
            if($request->has($field)){
                $productsQuery->where($field,1);
            }
        }

        $products = $productsQuery->paginate(3);

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
