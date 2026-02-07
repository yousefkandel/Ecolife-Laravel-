<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class AdminProductController extends Controller
{
     protected ProductService $service;
    protected CategoryService $categoryService;

    public function __construct(
        ProductService $service,
        CategoryService $categoryService
    ) {
        $this->service = $service;
        $this->categoryService = $categoryService;
    }

    /**
     * عرض المنتجات + الفلاتر
     */
    public function index(Request $request)
    {
        // الفلاتر جاية من الريكوست
        $filters = $request->only(['category', 'search']);

        // المنتجات (Pagination + Filters)
        $products = $this->service->paginate($filters);

        // الكاتيجوريز (عن طريق Service مش Query مباشر)
        $categories = $this->categoryService->all();

        return view('admin.product.index', compact('products', 'categories'));
    }

    /**
     * صفحة إضافة منتج
     */
    public function create()
    {
        $categories = $this->categoryService->all();

        return view('admin.product.add', compact('categories'));
    }

    /**
     * حفظ منتج جديد
     */
    public function store(StoreProductRequest $request)
    {
        // validated() بيرجع Array نظيف
        $this->service->create($request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * صفحة تعديل منتج
     */
    public function edit(Product $product)
    {
        $categories = $this->categoryService->all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * تحديث المنتج
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->service->update($product, $request->validated());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * حذف منتج
     */
    public function destroy(Product $product)
    {
        $this->service->delete($product);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
