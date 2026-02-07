<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartSessionService
{
    protected string $key = 'guest_cart';

    /**
     * جلب كل عناصر الكارت من السيشن
     */
    public function all()
    {
        $cart = Session::get($this->key, []);
        $items = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $items[] = (object)[
                    'product'  => $product,
                    'quantity' => $quantity
                ];
            }
        }

        return collect($items);
    }

    /**
     * إضافة منتج للكارت
     */
    public function add(int $productId, int $quantity = 1)
    {
        $cart = Session::get($this->key, []);
        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;
        Session::put($this->key, $cart);
        return ['product_id' => $productId, 'quantity' => $cart[$productId]];
    }

    /**
     * تحديث كمية منتج
     */
    public function update(int $productId, int $quantity)
    {
        $cart = Session::get($this->key, []);
        if (isset($cart[$productId])) {
            $cart[$productId] = $quantity;
            Session::put($this->key, $cart);
            return ['product_id' => $productId, 'quantity' => $quantity];
        }
        return null;
    }

    /**
     * حذف منتج
     */
    public function remove(int $productId)
    {
        $cart = Session::get($this->key, []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put($this->key, $cart);
            return true;
        }
        return false;
    }

    /**
     * تفريغ الكارت كله
     */
    public function clear()
    {
        Session::forget($this->key);
    }
}
