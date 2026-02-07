<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

public function index()
{
    $orders = Order::latest()->paginate(10); // أحدث الطلبات أولًا
    return view('admin.order.index', compact('orders'));
}

public function updateStatus(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:pending,completed,cancelled',
    ]);

    $order->update([
        'status' => $request->status
    ]);

    return back()->with('success', 'Order status updated successfully!');
}

public function show(Order $order)
{
    $order->load( 'items.product'); // جلب المنتجات المرتبطة بالطلب
    return view('admin.order.show', compact('order'));
}
public function destroy(Order $order)
{
    // حذف الطلب وكل العناصر المرتبطة به تلقائيًا (لأننا عاملين cascadeOnDelete في migration)
    $order->delete();

    return redirect()->route('orders.index')
                     ->with('success', 'Order deleted successfully!');
}


}
