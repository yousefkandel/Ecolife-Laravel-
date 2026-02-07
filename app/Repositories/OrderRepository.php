<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository
{
    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function addItems(Order $order, $items): void
    {
        foreach ($items as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product->id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }
    }
}

