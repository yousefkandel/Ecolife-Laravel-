<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->all();
        $adminAssets = asset('admin/assets');
        return view('admin.category.index', compact('categories', 'adminAssets'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category added successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->service->update($category, $request->validated());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $this->service->delete($category);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
