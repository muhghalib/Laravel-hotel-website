@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-sliders.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
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
                                    <li class="breadcrumb-item"><a href="/room/data">Room</a>
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
                                        <img src="{{ $data->image }}" class="img-fluid product-img rounded"
                                            alt="product image" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <h4 class="category-room"></h4>
                                    <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                        <h4 class="item-price me-1"></h4>
                                    </div>
                                    <div class="row col-12 mb-1 mt-1">
                                        <div class="card-text col-md-4 col-sm-6 mb-1">Available room : <span
                                                class="text-success">{{ $data->available_room }}</span></div>
                                        <div class="card-text col-md-4 col-sm-6 mb-1">Bedroom : <span
                                                class="text-success">{{ $data->total_bed_room }}</span></div>
                                        <div class="card-text col-md-4 col-sm-6">Bathroom : <span
                                                class="text-success">{{ $data->total_bath_room }}</span></div>
                                    </div>
                                    <p class="card-text">
                                        {{ $data->description }}
                                    </p>
                                    <ul class="product-features list-unstyled row col-md-11">
                                        @if ($data->wifi)
                                            <li class="col-sm-3"><i data-feather='wifi'></i> <span>Wifi</span></li>
                                        @endif

                                        @if ($data->ac)
                                            <li class="col-sm-3">
                                                <i class='far fa-snowflake' style='font-size:1.2rem'></i>
                                                <span>Ac</span>
                                            </li>
                                        @endif

                                        @if ($data->television)
                                            <li class="col-sm-3">
                                                <i class='fas fa-tv' style='font-size:1.2rem'></i>
                                                <span>Television</span>
                                            </li>
                                        @endif

                                        @if ($data->minibar)
                                            <li class="col-sm-3">
                                                <i class='fas fa-glass-martini' style='font-size:1.2rem'></i>
                                                <span>Minibar</span>
                                            </li>
                                        @endif


                                        @if ($data->include_breakfast)
                                            <li class="col-sm-3">
                                                <i class='fas fa-concierge-bell' style='font-size:1.2rem'></i>
                                                <span>Breakfast</span>
                                            </li>
                                        @endif

                                        @if ($data->king_bed)
                                            <li class="col-sm-3">
                                                <i class='fas fa-bed' style='font-size:1.2rem'></i>
                                                <span>King bed</span>
                                            </li>
                                        @endif

                                        @if ($data->twin_bed)
                                            <li class="col-sm-3">
                                                <i class='fas fa-bed' style='font-size:1.2rem'></i>
                                                <span>Twin bed</span>
                                            </li>
                                        @endif

                                        @if ($data->include_breakfast)
                                            <li class="col-sm-3">
                                                <i class='fas fa-concierge-bell' style='font-size:1.2rem'></i>
                                                <span>Breakfast</span>
                                            </li>
                                        @endif

                                        @if ($data->bathtub)
                                            <li class="col-sm-3">
                                                <i class='fas fa-bath' style='font-size:1.2rem'></i>
                                                <span>Bathtub</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <hr />
                                    <div class="d-flex flex-column flex-sm-row pt-1">
                                        <button class="btn btn-primary me-0 me-sm-1 mb-1 mb-sm-0 btn-delete"
                                            data-id="{{ $data->id }}">
                                            <i data-feather='trash'></i>
                                            <span class="add-to-cart">Delete</span>
                                        </button>
                                        <a href="/room/edit/{{ $data->id }}"
                                            class="btn btn-outline-secondary me-0 me-sm-1 mb-1 mb-sm-0">
                                            <i data-feather='edit-2'></i>
                                            <span>Edit</span>
                                        </a>
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
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-details.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            "use strict";

            $(document).ready(() => {
                $('.item-price').html(formatter.format(`{{ $data->price }}`));
                $('.category-room').html(toPascalCase(`{{ $data->category->name }}`))
            });

            $(document).delegate('.btn-delete', 'click', function() {
                const id = $(this).data('id');

                return Swal.fire({
                    text: 'Anda yakin akan menghapus data ini ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus !',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: `{{ url('room/api/delete') }}`,
                            type: 'post',
                            data: {
                                _token: `{{ csrf_token() }}`,
                                id
                            },
                            success: function(resp) {
                                return Swal.fire({
                                    icon: 'success',
                                    title: 'Dihapus!',
                                    text: 'Data berhasil dihapus.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(() => {
                                    window.location.assign('/room/data');
                                });
                            },
                            error: function(err) {
                                console.error(err);
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Data gagal dihapus.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            }
                        })
                    }
                });
            });

        })
    </script>
@endsection
