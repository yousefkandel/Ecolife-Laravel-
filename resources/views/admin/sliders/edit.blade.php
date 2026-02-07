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

                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Slider Title --}}
                        <div class="mb-3">
                            <label>Title</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title', $slider->title) }}" required>
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Slider Subtitle --}}
                        <div class="mb-3">
                            <label>Subtitle</label>
                            <input class="form-control" type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}">
                            @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        {{-- Active --}}
                        <div class="mb-3">
                            <label>Active</label>
                            <select name="is_active" class="form-select">
                                <option value="0" {{ old('is_active', $slider->is_active) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_active', $slider->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
is_active
                        {{-- Image --}}
                        <div class="mb-3">
                            <label>Slider Image</label>
                            <input class="form-control" type="file" name="image">
                            @if($slider->image)
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="" width="150" class="mt-2">
                            @endif
                        </div>

                        <div class="text-end mt-3">
                            <button class="btn btn-success" type="submit">Update Slider</button>
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
