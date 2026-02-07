<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Sliders فعالين فقط
        $sliders = Slider::where('is_active', 1)->latest()->get();

        // Best Seller Products
        $bestSellers = Product::with('category')
            ->where('is_bestseller', 1)
            ->latest()
            ->take(8)
            ->get();

        // Categories (بدون is_popular و image)
        $categories = Category::with(['product' => function ($q) {
            $q->latest()->take(6);
        }])->withCount('product')
          ->select('id', 'name') // بس name و id موجودين دلوقتي
          ->get();

        // Latest Products (home section)
        $products = Product::latest()
            ->take(8)
            ->get();

        return view(
            'user.home.index',
            compact('categories', 'products', 'bestSellers', 'sliders')
        );
    }
}
