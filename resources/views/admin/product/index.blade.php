@php
    $adminAssets = asset('admin/assets');
@endphp

@extends('admin.layouts.main')
@section('section')

<div class="page-body pt-3">

  <div class="container-fluid product-wrapper">

    {{-- رسائل النجاح --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- تحقق لو فيه Categories --}}
    @if($categories->isEmpty())
        <div class="alert alert-warning">
            No categories found. Please <a href="{{ route('categories.create') }}">add a category</a> first.
        </div>
    @else

        {{-- Filters و Search --}}
        <div class="product-grid">
            <div class="feature-products">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="product-sidebar">
                            <div class="filter-section">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">Filters<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                                    </div>
                                    <div class="left-filter">
                                        <div class="card-body filter-cards-view animate-chk custom-scrollbar">
                                            <div class="product-filter">
                                                <h4 class="mb-1">Category</h4>
                                                <div class="checkbox-animated mt-0">
                                                    <label class="d-block">
                                                        <input type="radio"
                                                               name="category"
                                                               {{ request('category') ? '' : 'checked' }}
                                                               onclick="window.location='{{ route('products.index') }}'">
                                                        All Products
                                                    </label>
                                                    @foreach($categories as $category)
                                                    <label class="d-block">
                                                        <input type="radio"
                                                               name="category"
                                                               {{ request('category') == $category->id ? 'checked' : '' }}
                                                               onclick="window.location='{{ route('products.index', ['category' => $category->id]) }}'">
                                                        {{ $category->name }}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-12">
                        <form method="GET" action="{{ route('products.index') }}">
                            <div class="form-group m-0 d-flex">
                                <input class="form-control" type="search" name="search"
                                       placeholder="Search..."
                                       value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary ms-2" style="all: unset; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- تحقق لو فيه Products --}}
            @if($products->isEmpty())
                <div class="alert alert-info mt-3">
                    No products found. <a href="{{ route('products.create') }}">Add a product</a>
                </div>
            @else
                <div class="product-wrapper-grid mt-3">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="card" style="height: 400px;">
                                <div class="product-box d-flex flex-column">

                                    {{-- Product Image --}}
                                    <div class="product-img" style="height: 220px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                        <img class="img-fluid"
                                             src="{{ $product->image ? asset('storage/'.$product->image) : $adminAssets.'/images/default-product.jpg' }}"
                                             alt="{{ $product->name }}"
                                             style="height: 100%; width: auto; object-fit: cover;">
                                        <div class="product-hover">
                                            <ul class="d-flex gap-1">
                                                <li><a href="{{ route('products.edit', $product->id) }}"><i class="icon-pencil"></i></a></li>
                                                <li>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="all: unset; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- Product Details --}}
                                    <div class="product-details mt-auto">
                                        <div class="mb-1">
                                            @if($product->is_featured)
                                                <span class="badge bg-primary">Featured</span>
                                            @endif
                                            @if($product->is_on_sale)
                                                <span class="badge bg-danger">On Sale</span>
                                            @endif
                                            @if($product->is_bestseller)
                                                <span class="badge bg-success">Best Seller</span>
                                            @endif
                                        </div>
                                        <h6>{{ $product->name }}</h6>
                                        <p class="text-muted mb-1">{{ $product->category?->name }}</p>
                                        <div class="product-price">
                                            {{ $product->price }} EGP
                                            @if($product->old_price)
                                                <del>{{ $product->old_price }}</del>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

    @endif
  </div>

</div>
@endsection
