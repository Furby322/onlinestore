<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Http\Requests\ProductsFilterRequest;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
//
        foreach (['hit', 'new_item', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }

        $products = $productsQuery->paginate(6);

        return view('index', compact('products'));
    }

    public function сategories()
    {
        $сategories = Category::get();
        return view('сategories', compact('сategories'));
    }

    public function product($category, $productCode)
    {
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
        return view('product', compact('product', 'category'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function subscribe(SubscriptionRequest $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success',
            'Спасибо за ожидание, мы сообщим вам о поступлении товара на почту');
    }

}
