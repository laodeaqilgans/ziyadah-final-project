@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="authent-logo text-center">
                            <img src="{{ asset('images/bq-circle.png') }}" alt="Logo" style="max-width: 30%;">
                        </div>

                        <!-- Teks Sambutan -->
                        <div class="authent-text text-center">
                            <p class="fw-bold fs-4">Welcome to Ziyadah</p>
                            <p>Enter your details to create your account</p>
                        </div>

                        <!-- Form Register -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Fullname Input -->
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name">Fullname</label>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">Email address</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <label for="password">Password</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm">Confirm Password</label>
                                </div>
                            </div>

                            <!-- Terms and Conditions Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="termsCheck" name="terms">
                                <label class="form-check-label" for="termsCheck">
                                    I agree to the <a href="#">Terms and Conditions</a>
                                </label>
                            </div>

                            <!-- Register Button -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary m-b-xs">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>

                        <!-- Login Link -->
                        <div class="authent-login text-center">
                            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
