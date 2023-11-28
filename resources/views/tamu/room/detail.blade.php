@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce-details.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Room Details</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/room/list">Room</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detail
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- app e-commerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <!-- Product Details starts -->
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col-12 col-md-5 d-flex align-items-start justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="{{ $room->image }}" class="img-fluid product-img rounded"
                                            alt="product image" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <h4 class="category-room"></h4>
                                    <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                        <h4 class="item-price me-1"></h4>
                                    </div>
                                    <div class="row col-12 mb-1 mt-1">
                                        <div class="card-text col-md-2 mb-1">Bedroom : <span
                                                class="text-success">{{ $room->total_bed_room }}</span></div>
                                        <div class="card-text col-md-2">Bathroom : <span
                                                class="text-success">{{ $room->total_bath_room }}</span></div>
                                    </div>
                                    <p class="card-text">
                                        {{ $room->description }}
                                    </p>
                                    <ul class="product-features list-unstyled row col-md-11">
                                        @if ($room->wifi)
                                            <li class="col-sm-3"><i data-feather='wifi'></i> <span>Wifi</span></li>
                                        @endif

                                        @if ($room->ac)
                                            <li class="col-sm-3">
                                                <i class='far fa-snowflake' style='font-size:1.2rem'></i>
                                                <span>Ac</span>
                                            </li>
                                        @endif

                                        @if ($room->television)
                                            <li class="col-sm-3">
                                                <i class='fas fa-tv' style='font-size:1.2rem'></i>
                                                <span>Television</span>
                                            </li>
                                        @endif

                                        @if ($room->minibar)
                                            <li class="col-sm-3">
                                                <i class='fas fa-glass-martini' style='font-size:1.2rem'></i>
                                                <span>Minibar</span>
                                            </li>
                                        @endif


                                        @if ($room->include_breakfast)
                                            <li class="col-sm-3">
                                                <i class='fas fa-concierge-bell' style='font-size:1.2rem'></i>
                                                <span>Breakfast</span>
                                            </li>
                                        @endif

                                        @if ($room->king_bed)
                                            <li class="col-sm-3">
                                                <i class='fas fa-bed' style='font-size:1.2rem'></i>
                                                <span>King bed</span>
                                            </li>
                                        @endif

                                        @if ($room->twin_bed)
                                            <li class="col-sm-3">
                                                <i class='fas fa-bed' style='font-size:1.2rem'></i>
                                                <span>Twin bed</span>
                                            </li>
                                        @endif

                                        @if ($room->include_breakfast)
                                            <li class="col-sm-3">
                                                <i class='fas fa-concierge-bell' style='font-size:1.2rem'></i>
                                                <span>Breakfast</span>
                                            </li>
                                        @endif

                                        @if ($room->bathtub)
                                            <li class="col-sm-3">
                                                <i class='fas fa-bath' style='font-size:1.2rem'></i>
                                                <span>Bathtub</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <hr />
                                    <div class="d-flex flex-column flex-sm-row pt-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Details ends -->
                    </div>
                </section>
                <!-- app e-commerce details end -->

            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-details.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            "use strict";

            let paramObj = {
                check_out: searchParams.get('check_out') ? Base64.decode(searchParams.get('check_out')) : false,
                check_in: searchParams.get('check_in') ? Base64.decode(searchParams.get('check_in')) : false,
                checkroom: searchParams.get('checkroom') ? Boolean(Base64.decode(searchParams.get(
                    'checkroom'))) : false
            };

            $(document).ready(() => {
                if (paramObj.checkroom) {
                    $('.pt-1').append(
                        '<button class="btn btn-primary btn-icon me-0 me-sm-1 mb-1 mb-sm-0 btn-checkout" data-id="' +
                        `{{ $room->id }}` + '">' +
                        '<i data-feather="navigation" class="me-1">' + '</i>' +
                        '<span class="add-to-cart">Checkout room</span>' +
                        '</button>');
                }
                $('.item-price').text(formatter.format(`{{ $room->price }}`));
                $('.category-room').text(toPascalCase(`{{ $room->category->name }}`));
            });

            $(document).delegate('.btn-checkout', 'click', (e) => {
                e.preventDefault();
                const id = e.currentTarget.getAttribute('data-id');
                const user = `{!! Auth::user()->email_verified_at !!}`;

                if (user && paramObj) {
                    pushParamsQuery(searchParams.toString(), `{{ url('order/create') }}`);
                }

                if (user === "") {
                    return Swal.fire({
                        text: 'Anda harus verifikasi email anda terlebih dahulu',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Verification now',
                        cancelButtonText: 'Skip for now',
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-outline-danger ms-1'
                        },
                        buttonsStyling: false
                    }).then(result => {
                        if (result.value) {
                            return window.location.assign(`{{ route('verification.notice') }}`);
                        }
                    })
                }
            });
        });
    </script>
@endsection
