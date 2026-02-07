@extends('admin.layouts.main')
@section('section')
<div class="page-body">
    <div class="container-fluid">

        <h4 class="mb-3">Add Category</h4>

        {{-- عرض الأخطاء --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="theme-form">
            @csrf

            {{-- Category Name --}}
            <div class="mb-3">
                <label>Category Name</label>
                <input name="name" class="form-control" type="text" placeholder="Enter category name" value="{{ old('name') }}">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>



            {{-- Submit Buttons --}}
            <div class="text-end">
                <button type="submit" class="btn btn-success me-3">Add Category</button>
                <a class="btn btn-danger" href="{{ route('categories.index') }}">Cancel</a>
            </div>

        </form>

    </div>
</div>
@endsection
