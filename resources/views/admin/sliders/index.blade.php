@php
    $adminAssets = asset('admin/assets');
@endphp

@extends('admin.layouts.main')
@section('section')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        {{-- عرض رسائل النجاح --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="list-product">
                            @if($sliders->isEmpty())
                                <div class="alert alert-info">
                                    No sliders found. <a href="{{ route('sliders.create') }}">Add a Slider</a>
                                </div>
                            @else
                                <div class="datatable-container">
                                    <table class="table datatable-table" id="slider-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%;"><input type="checkbox" class="form-check-input checkbox-primary"></th>
                                                <th style="width: 20%;">Title</th>
                                                <th style="width: 20%;">Subtitle</th>

                                                <th style="width: 10%;">Image</th>
                                                <th style="width: 10%;">Active</th>
                                                <th style="width: 10%;">Created At</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sliders as $slider)
                                                <tr>
                                                    <td><input type="checkbox" class="form-check-input checkbox-primary"></td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td>{{ $slider->subtitle }}</td>
                                                 
                                                    <td>
                                                        <div class="light-product-box" style="width: 60px; height: 60px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                                            <img class="img-fluid"
                                                                 src="{{ $slider->image ? asset('storage/'.$slider->image) : $adminAssets.'/images/default-product.jpg' }}"
                                                                 alt="{{ $slider->title }}"
                                                                 style="height: 100%; width: auto; object-fit: cover;">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $slider->is_active ? 'Yes' : 'No' }}
                                                    </td>
                                                    <td>{{ $slider->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <div class="product-action">
                                                            <a href="{{ route('sliders.edit', $slider->id) }}">
                                                                <i class="icon-pencil"></i>
                                                            </a>
                                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="border:none; background:none; padding:0;">
                                                                    <i class="icon-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="datatable-bottom">
                                    <div class="datatable-info">
                                        Showing 1 to {{ $sliders->count() }} of {{ $sliders->count() }} entries
                                    </div>
                                    {{-- لو محتاج Pagination تقدر تضيفها هنا --}}
                                </div>

                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
