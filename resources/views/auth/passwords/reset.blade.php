@extends('auth.layouts.auth')

@section('title')
    Reset Password
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Forgot Password basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="brand-logo">
                                    <h2 class="brand-text text-primary">Reset Password</h2>
                                </a>
                                <form class="auth-forgot-password-form mt-2" method="POST"
                                    action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-1">
                                        <label for="forgot-password-email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                            readonly />
                                    </div>
                                    <div class="mb-1">
                                        <label for="register-password" class="form-label">{{ __('Password') }}</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror form-control-merge"
                                                name="password" required autocomplete="new-password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input id="password-confirm" type="password"
                                                class="form-control form-control-merge" name="password_confirmation"
                                                required autocomplete="new-password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="2">{{ __('Reset Password') }}</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="/login"> <i data-feather="chevron-left"></i> Back to login </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Forgot Password basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
