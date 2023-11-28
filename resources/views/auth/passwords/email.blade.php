@extends('auth.layouts.auth')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2" id="section-block">
                    <div class="auth-inner my-2">
                        <!-- Forgot Password basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="brand-logo">
                                    <h2 class="brand-text text-primary">Confirm email</h2>
                                </a>
                                <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your
                                    password</p>
                                <div class="demo-spacing-0">
                                    <div class="alert alert-success alert-dismissible fade d-none" role="alert">
                                        <div class="alert-body">
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                <form class="auth-forgot-password-form mt-2">
                                    <div class="mb-1">
                                        <label for="forgot-password-email"
                                            class="form-label">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="" required autocomplete="email" autofocus />
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="email"></strong>
                                        </span>
                                    </div>

                                    <button class="btn btn-primary w-100" tabindex="2"
                                        type="submit">{{ __('Send Password Reset Link') }}</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
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

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-blockui.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/components/components-alerts.min.js') }}"></script>
    <script type="text/javascript">
        let inputVal = {
            email: '',
            _token: `{{ csrf_token() }}`
        };

        $('input').on('change', (e) => {
            const {
                name,
                value
            } = e.currentTarget;
            inputVal = {
                ...inputVal,
                [name]: value
            };
        });

        $(document).ajaxStart(function() {
            $('#section-block').block({
                message: '<div class="d-flex justify-content-center align-items-center"><p class="me-50 mb-0">Please wait...</p><div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',
                css: {
                    backgroundColor: 'transparent',
                    border: '0',
                    color: "#fff"
                },
                overlayCSS: {
                    opacity: 0.5
                }
            });
        }).ajaxComplete(function() {
            $('#section-block').unblock();
        });

        $(document).delegate('form', 'submit', (e) => {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: `{{ url('password/email') }}`,
                dataType: 'json',
                data: inputVal,
                success: (resp) => {
                    $('.alert-success').removeClass('d-none').addClass('show');
                    $('.alert-body').addClass('show').text(resp.message);
                },
                error: (err) => {
                    const errMessage = err.responseJSON.errors;
                    $("strong").each((index, item) => {
                        if (errMessage.hasOwnProperty(item.className)) {
                            const inputEl = $(`[name='${item.className}']`);
                            !inputEl.hasClass("is-invalid") && inputEl.addClass("is-invalid");
                        } else {
                            $(`[name='${item.className}']`).removeClass(
                                "is-invalid");
                        }
                        return item.textContent = errMessage[item.className];
                    });
                }
            });
        });
    </script>
@endsection
