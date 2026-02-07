<?php

namespace App\Services;

use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;

class CartService
{
    protected CartRepository $cartRepo;
    protected CartSessionService $guestCart;

    public function __construct(CartRepository $cartRepo, CartSessionService $guestCart)
    {
        $this->cartRepo  = $cartRepo;
        $this->guestCart = $guestCart;
    }
/**
 * إجمالي سعر الكارت
 */
public function total(): float
{
    return $this->all()->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });
}

    /**
     * جلب كل عناصر الكارت
     */
    public function all()
    {
        return $this->isAuth()
            ? $this->cartRepo->all(Auth::id())
            : $this->guestCart->all();
    }

    /**
     * إضافة منتج
     */
    public function add(int $productId, int $quantity = 1)
    {
        return $this->isAuth()
            ? $this->addAuth($productId, $quantity)
            : $this->guestCart->add($productId, $quantity);
    }

    /**
     * تحديث كمية
     */
    public function update(int $productId, int $quantity)
    {
        return $this->isAuth()
            ? $this->updateAuth($productId, $quantity)
            : $this->guestCart->update($productId, $quantity);
    }

    /**
     * حذف منتج
     */
    public function remove(int $productId)
    {
        return $this->isAuth()
            ? $this->removeAuth($productId)
            : $this->guestCart->remove($productId);
    }

    /**
     * تفريغ الكارت
     */
    public function clear()
    {
        return $this->isAuth()
            ? $this->cartRepo->clear(Auth::id())
            : $this->guestCart->clear();
    }

    /* =======================
       Auth methods
       ======================= */

    protected function isAuth(): bool
    {
        return Auth::check();
    }

    protected function addAuth(int $productId, int $quantity)
    {
        $userId = Auth::id();
        $cartItem = $this->cartRepo->find($userId, $productId);

        if ($cartItem) {
            return $this->cartRepo->update($cartItem, [
                'quantity' => $cartItem->quantity + $quantity
            ]);
        }

        return $this->cartRepo->create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);
    }

    protected function updateAuth(int $productId, int $quantity)
    {
        $userId = Auth::id();
        $cartItem = $this->cartRepo->find($userId, $productId);
        return $cartItem ? $this->cartRepo->update($cartItem, ['quantity' => $quantity]) : null;
    }

    protected function removeAuth(int $productId)
    {
        $userId = Auth::id();
        $cartItem = $this->cartRepo->find($userId, $productId);
        return $cartItem ? $this->cartRepo->delete($cartItem) : false;
    }

}
