<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
  View::composer('*', function ($view) {
    // جلب جميع الأقسام
    $categories = Category::select('id', 'name')->get();

    // إعداد الكارت
    $cartTotal = 0;
    $cartCount = 0;

    if (Auth::check()) {
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        foreach ($cartItems as $item) {
            if ($item->product) {
                $cartCount += $item->quantity;
                $cartTotal += $item->quantity * $item->product->price;
            }
        }
    } else {
        $sessionCart = Session::get('guest_cart', []); // نفس المفتاح في CartSessionService
        foreach ($sessionCart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $cartCount += $quantity;
                $cartTotal += $quantity * $product->price;
            }
        }
    }

    // مشاركة البيانات لكل الـ Blade (بما فيها الهيدر)
    $view->with([
        'categories' => $categories,
        'cartTotal'  => $cartTotal,
        'cartCount'  => $cartCount,
    ]);
});

}
}
