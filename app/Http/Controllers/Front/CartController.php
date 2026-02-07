<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Product;

class CartController extends Controller
{
  protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * عرض الكارت
     */
    public function index()
    {
        $cartItems = $this->cartService->all();

        return view('user.cart.cart', compact('cartItems'));
    }

    /**
     * إضافة منتج للكارت
     */
    public function add(Request $request, int $productId)
    {
        $quantity = $request->input('quantity', 1);
        $this->cartService->add($productId, $quantity);
        return redirect()->back()->with('success', 'تمت إضافة المنتج للكارت');
    }

    /**
     * تحديث كمية منتج
     */
   public function update(Request $request)
{
    $quantities = $request->input('quantity', []);

    foreach ($quantities as $productId => $quantity) {
        $this->cartService->update((int)$productId, (int)$quantity);
    }

    return redirect()->back()->with('success', 'تم تحديث الكميات بنجاح');
}


    /**
     * حذف منتج
     */
    public function remove(int $productId)
    {
        $this->cartService->remove($productId);
        return redirect()->back()->with('success', 'تم حذف المنتج من الكارت');
    }

    /**
     * تفريغ الكارت
     */
    public function clear()
    {
        $this->cartService->clear();
        return redirect()->back()->with('success', 'تم تفريغ الكارت');
    }
}
