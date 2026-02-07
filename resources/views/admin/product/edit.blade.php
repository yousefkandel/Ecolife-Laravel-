@extends('admin.layouts.main')

@section('section')
        <div class="page-body">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                          {{-- عرض كل الأخطاء --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name', $product->name) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" name="desc" rows="3">{{ old('desc', $product->desc) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input class="form-control" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Old Price</label>
                                    <input class="form-control" type="number" step="0.01" name="old_price" value="{{ old('old_price', $product->old_price) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select class="form-select" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                    @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="" width="100" class="mt-2">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
                                    <label class="form-check-label">Featured</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_on_sale" value="1" {{ $product->is_on_sale ? 'checked' : '' }}>
                                    <label class="form-check-label">On Sale</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_bestseller" value="1" {{ $product->is_bestseller ? 'checked' : '' }}>
                                    <label class="form-check-label">Bestseller</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button class="btn btn-success" type="submit">Update Product</button>
                            <a class="btn btn-danger" href="{{ route('products.index') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
