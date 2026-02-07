@extends('admin.layouts.main')
@section('section')
<div class="page-body">
    <div class="container-fluid">

        <h4 class="mb-3">Categories</h4>

        {{-- رسالة النجاح --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($categories->isEmpty())
            <div class="alert alert-warning">No categories found</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>


                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
@endsection
