@php
    $adminAssets = asset('admin/assets');
@endphp

@extends('admin.layouts.main')

@section('section')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">

        {{-- رسائل النجاح --}}
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
                            @if($contacts->isEmpty())
                                <div class="alert alert-info">
                                    No messages found.
                                </div>
                            @else
                                <div class="datatable-container">
                                    <table class="table datatable-table" id="contact-table">
                                        <thead>
                                            <tr>
                                                <th style="width:3%;">
                                                    <input type="checkbox" class="form-check-input checkbox-primary">
                                                </th>
                                                <th style="width:15%;">Name</th>
                                                <th style="width:20%;">Email</th>
                                                <th style="width:20%;">Subject</th>
                                                <th style="width:25%;">Message</th>
                                                <th style="width:10%;">Created At</th>
                                                <th style="width:7%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $contact)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input checkbox-primary">
                                                    </td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>
                                                        {{ Str::limit($contact->message, 50) }}
                                                    </td>
                                                    <td>
                                                        {{ $contact->created_at->format('Y-m-d') }}
                                                    </td>
                                                    <td>
                                                        <div class="product-action">
                                                            <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                                  method="POST"
                                                                  onsubmit="return confirm('Are you sure?')"
                                                                  style="display:inline-block;">
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
                                        Showing {{ $contacts->count() }} of {{ $contacts->total() }} entries
                                    </div>
                                    {{ $contacts->links() }}
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
