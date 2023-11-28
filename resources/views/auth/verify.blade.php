@extends('auth.layouts.auth')

@section('title')
    Register
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
                        <!-- verify email basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="brand-logo">
                                    <h2 class="brand-text text-primary ms-1">Ngoktel</h2>
                                </a>

                                <h2 class="card-title fw-bolder mb-1">Verify your email ✉️</h2>
                                <p class="card-text mb-2">
                                    We've sent a link to your email address Please follow the
                                    link inside to continue.
                                </p>

                                <a class="btn btn-primary btn-skip w-100">Skip for now</a>

                                <form method="POST" class="text-center mt-2 row align-items-center justify-content-center"
                                    action="{{ route('verification.resend') }}">
                                    @csrf
                                    <span>Didn't receive an email?</span><button type="submit"
                                        class="btn-flat-primary btn">Resend</button>
                                </form>
                            </div>
                        </div>
                        <!-- / verify email basic -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('page-js')
    <script type="text/javascript">
        $(function() {
            $(document).delegate('.btn-skip', 'click', () => {
                window.history.assign('/home');
            });
        });
    </script>
@endsection
