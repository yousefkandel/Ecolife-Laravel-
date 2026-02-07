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

                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="theme-form">
                        @csrf

                        {{-- Slider Title --}}
                        <div class="mb-3">
                            <label>Slider Title</label>
                            <input name="title" class="form-control" type="text" placeholder="Enter slider title" value="{{ old('title') }}">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Slider Subtitle --}}
                        <div class="mb-3">
                            <label>Slider Subtitle</label>
                            <input name="subtitle" class="form-control" type="text" placeholder="Enter slider subtitle" value="{{ old('subtitle') }}">
                            @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                 

                        {{-- Slider Image --}}
                        <div class="mb-3">
                            <label>Upload Slider Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Active --}}
                        <div class="mb-3">
                            <label>Active</label>
                            <select name="is_active" class="form-select">
                                <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="text-end">
                            <button type="submit" class="btn btn-success me-3">Add Slider</button>
                            <a class="btn btn-danger" href="{{ route('sliders.index') }}">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
