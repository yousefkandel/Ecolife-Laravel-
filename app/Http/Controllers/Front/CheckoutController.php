<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\CheckoutService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    public function __construct(
        protected CheckoutService $checkout,
        protected CartService $cart
    ) {}

 public function index()
{
    $cart = $this->cart->all();

    $total = 0;
    foreach ($cart as $item) {
        if ($item->product) {
            $total += $item->product->price * $item->quantity;
        }
    }

    return view('user.checkout.index', compact('cart', 'total'));
}



    public function store(CheckoutRequest  $request)
    {
      $data = $request->validated();
    $order = $this->checkout->checkout($data);
    return redirect()->back();
    }
}
