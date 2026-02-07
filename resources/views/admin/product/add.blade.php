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

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="theme-form">
                        @csrf

                        {{-- Product Name --}}
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input name="name" class="form-control" type="text" placeholder="Enter product name" value="{{ old('name') }}">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Category --}}
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Category</label>
                                 <select name="category_id" class="form-select">
    <option value="">Select Category</option>

    @foreach($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

                                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Price --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input name="price" class="form-control" type="number" step="0.01" placeholder="Enter product price" value="{{ old('price') }}">
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Old Price</label>
                                    <input name="old_price" class="form-control" type="number" step="0.01" placeholder="Optional" value="{{ old('old_price') }}">
                                </div>
                            </div>
                        </div>

                        {{-- Product Description --}}
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="desc" class="form-control" rows="3">{{ old('desc') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label>Featured</label>
                                    <select name="is_featured" class="form-select">
                                        <option value="0">No</option>
                                        <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label>On Sale</label>
                                    <select name="is_on_sale" class="form-select">
                                        <option value="0">No</option>
                                        <option value="1" {{ old('is_on_sale') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label>Bestseller</label>
                                    <select name="is_bestseller" class="form-select">
                                        <option value="0">No</option>
                                        <option value="1" {{ old('is_bestseller') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Product Image --}}
                        <div class="row">
                            <div class="col custom-dropzone-product">
                                <div class="mb-3">
                                    <label>Upload Product Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="row">
                            <div class="col text-end">
                                <button type="submit" class="btn btn-success me-3">Add Product</button>
                                <a class="btn btn-danger" href="{{ route('products.index') }}">Cancel</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
