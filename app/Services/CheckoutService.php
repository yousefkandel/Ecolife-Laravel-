<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class CheckoutService
{
    public function __construct(
        protected OrderRepository $orders,
        protected CartRepository $cart
    ) {}

    public function checkout(array $data)
    {
        $userId = Auth::id(); // جلب معرف المستخدم الحالي
        $cartItems = $this->cart->all($userId);

        if ($cartItems->isEmpty()) {
            throw new Exception('Cart is empty');
        }

        return DB::transaction(function () use ($data, $cartItems, $userId) {

            $total = $cartItems->sum(fn ($item) => $item->subtotal);

            // إنشاء الطلب
            $order = $this->orders->create([
                'user_id'    => $userId,
                'first_name' => $data['first_name'],
                'last_name'  => $data['last_name'],
                'address'    => $data['address'],
                'address2'   => $data['address2'] ?? null,
                'city'       => $data['city'],
                'state'      => $data['state'],
                'zip'        => $data['zip'],
                'country'    => $data['country'],
                'phone'      => $data['phone'],
                'email'      => $data['email'],
                'notes'      => $data['notes'] ?? null,
                'total'      => $total,
                'status'     => 'pending',
            ]);

            // إضافة عناصر السلة للطلب
            $this->orders->addItems($order, $cartItems);

            // مسح السلة بعد الطلب
            $this->cart->clear($userId);

            return $order;
        });
    }
}
