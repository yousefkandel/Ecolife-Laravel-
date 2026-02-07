@extends('user.layouts.main')
@php
    $pageTitle = '  Login Page';
@endphp

@section('section')
<div class="login-register-area mb-60px mt-53px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mx-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4>Login</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email -->
                                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <!-- Password -->
                                        <input type="password" name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <!-- Remember Me -->
                                        <div class="button-box d-flex justify-content-between align-items-center mb-3">
                                            <label class="login-toggle-btn">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember me
                                            </label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            @endif
                                        </div>

                                        <div class="button-box">
                                            <button type="submit"><span>Login</span></button>
                                        </div>

                                        <!-- Session Status -->
                                        @if(session('status'))
                                            <div class="alert alert-success mt-2">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        @if(session('error'))
                                            <div class="alert alert-danger mt-2">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
@endsection
