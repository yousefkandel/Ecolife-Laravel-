<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // جلب كل الأقسام (للهيدر)
        $categories = Category::all();

        // جلب المنتجات مع الفلترة بالقسم
        $products = Product::query()
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->get();

        return view('user.shop.product', compact('products', 'categories'));
    }
}
