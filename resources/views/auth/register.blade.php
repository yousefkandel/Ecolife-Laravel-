@extends('user.layouts.main')

@section('section')
<div class="login-register-area mb-60px mt-53px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mx-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a data-bs-toggle="tab" href="#lg2" class="active">
                            <h4>Register</h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <!-- Email -->
                                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <!-- Password -->
                                        <input type="password" name="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <!-- Confirm Password -->
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="button-box mt-3">
                                            <button type="submit"><span>Register</span></button>
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

                                        <div class="mt-2">
                                            <a href="{{ route('login') }}">Already registered? Login</a>
                                        </div>
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
