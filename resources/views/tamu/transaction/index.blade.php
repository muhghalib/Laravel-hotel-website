@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce-details.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.min.css') }}">
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
                            <h2 class="content-header-title float-start mb-0">Checkout Room</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/room/list">Room</a>
                                    </li>
                                    <li class="breadcrumb-item active">Checkout room
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Buat Pesanan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row my-2">
                                        <div
                                            class="col-12 col-md-5 d-flex align-items-start justify-content-center mb-2 mb-md-0">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img src="{{ $data->image }}" class="img-fluid product-img rounded"
                                                    alt="product image" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <h4 class="category-room text-primary">{{ $data->category->name }}</h4>
                                            <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                                                <h4 class="item-price me-1"></h4>
                                            </div>
                                            <p class="card-text">
                                                {{ $data->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <form class="form">
                                        <div class="row">
                                            @csrf
                                            <div class="col-12 mb-1">
                                                <label class="form-label" for="city-column">Room</label>
                                                <input type="text" id="city-column" class="form-control" name="id"
                                                    readonly value="{{ $data->category->name }}" />
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="fp-default">Tanggal check-in</label>
                                                <input type="text" id="fp-default" name="check_in" class="form-control"
                                                    placeholder="YYYY-MM-DD" readonly />
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="check_in"></strong>
                                                </span>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="fp-default">Tanggal check-out</label>
                                                <input type="text" id="fp-default" name="check_out" class="form-control"
                                                    placeholder="YYYY-MM-DD" readonly />
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="check_out"></strong>
                                                </span>
                                            </div>
                                            <div class="col-md-12 row align-items-center mb-1">
                                                <label class="form-label col-sm-2" for="price">Total room:</label>
                                                <div class="input-group disabled-touchspin bootstrap-touchspin disabled">
                                                    <input type="number" class=" touchspin" value="1"
                                                        name="total_room" disabled />
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="total_room"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label class="form-label" for="price">Total Price</label>
                                                <input type="text" class="form-control numeral-mask" id="price"
                                                    name="total_price" readonly />
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="total_price"></strong>
                                                </span>
                                            </div>
                                            <hr />
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Buat pesanan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-details.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-input-mask.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-number-input.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            let paramsObj = {
                check_out: Base64.decode(searchParams.get('check_out')),
                check_in: Base64.decode(searchParams.get('check_in')),
                total_room: Base64.decode(searchParams.get('total_room'))
            };

            $(document).ready(() => {
                const totalPrice = `{{ $data->price }}` * parseInt(paramsObj.total_room) * dateOperator(
                    paramsObj.check_in, paramsObj.check_out);

                $('.item-price').text(formatter.format(`{{ $data->price }}`));
                $('[name="total_price"]').val(totalPrice);

                $('input').each((i, item) => {
                    if (paramsObj.hasOwnProperty(item.name)) {
                        $(item).val(paramsObj[item.name]);
                    }
                });
            });

            $(document).delegate('.form', 'submit', (e) => {
                e.preventDefault();
                const rand_code = makeId(20);
                const formData = $(e.currentTarget).serialize().replace(/%2C/g, '') +
                    `&room_id={{ $data->id }}` + `&user_id={{ Auth::user()->id }}` +
                    `&order_code=${rand_code}` + `&total_room=${$("[name='total_room']").val()}`;

                $.ajax({
                    type: "POST",
                    url: `{{ url('order/store') }}`,
                    data: formData,
                    dataType: 'json',
                    success: (resp) => {
                        return Swal.fire({
                            title: 'Berhasil',
                            text: 'Pesanan berhasil ditambahkan, mau lihat pesanan anda?',
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Ya !',
                            cancelButtonText: 'Tidak',
                            customClass: {
                                confirmButton: 'btn btn-primary',
                                cancelButton: 'btn btn-outline-danger ms-1'
                            },
                            buttonsStyling: false
                        }).then((result) => {
                            if (result.value) {
                                window.location.assign(`{{ url('order/list') }}`);
                            } else {
                                pushParamsQuery(searchParams.toString(),
                                    `{{ url('room/list') }}`);
                            }
                        });
                    },
                    error: (err) => {
                        console.error(err);
                        Swal.fire({
                            icon: 'error',
                            text: 'Data gagal ditambah.',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                        const errMessage = jQuery.parseJSON(err.responseJSON
                            .message);
                        $("strong").each((index, item) => {
                            if (errMessage.hasOwnProperty(item
                                    .className)) {
                                const inputEl = $(
                                    `[name='${item.className}']`
                                );
                                !inputEl.hasClass("is-invalid") &&
                                    inputEl.addClass("is-invalid");
                            } else {
                                $(`[name='${item.className}']`)
                                    .removeClass("is-invalid");
                            }
                            return $(item).text(errMessage[item
                                .className]);
                        });
                    }
                });
            });
        });
    </script>
@endsection
