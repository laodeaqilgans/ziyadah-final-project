@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <!-- Login Page -->
    <div class="login-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card login-box-container">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="authent-logo text-center mb-4">
                                <img src="{{ asset('images/bq-circle.png') }}" alt="Logo" style="max-width: 90px;">
                            </div>

                            <!-- Welcome Text -->
                            <div class="authent-text text-center mb-4">
                                <p class="fw-bold fs-4">Welcome to Ziyadah</p>
                                <p>Please sign in to your account.</p>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}" class="login-form">
                                @csrf

                                <!-- Email Input -->
                                <div class="form-floating mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password Input -->
                                <div class="form-floating mb-3 position-relative">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    <label for="password">Password</label>
                                    <i id="togglePassword" class="fa fa-eye position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 18px;"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>

                                <!-- Forgot Password Link -->
                                <div class="d-flex justify-content-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>

                            <!-- Register Link -->
                            <div class="authent-reg text-center mt-4">
                                <p>Not registered? <a href="{{ route('register') }}">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Password Toggle Visibility
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function(e) {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
