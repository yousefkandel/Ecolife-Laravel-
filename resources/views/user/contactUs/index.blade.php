@extends('user.layouts.main')
@php
    $pageTitle = ' Contact Us Page';
@endphp

@section('section')
<div class="contact-area mtb-60px">
    <div class="container">

        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    ...
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="contact-form">

                    <div class="contact-title mb-30">
                        <h2>Get In Touch</h2>
                    </div>

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="contact-form-style"
                          action="{{ route('contact.store') }}"
                          method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <input name="name" placeholder="Name*" type="text" value="{{ old('name') }}">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <input name="email" placeholder="Email*" type="email" value="{{ old('email') }}">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-12">
                                <input name="subject" placeholder="Subject*" type="text" value="{{ old('subject') }}">
                                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Your Message*">{{ old('message') }}</textarea>
                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                <button class="submit" type="submit">SEND</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
