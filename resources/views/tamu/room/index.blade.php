@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Room</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Room
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="ecommerce-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ecommerce-header-items">
                                <div class="result-toggler">
                                    <div class="search-results"></div>
                                </div>
                                <div class="view-options d-flex">
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="radio_options" id="radio_option1"
                                            autocomplete="off" />
                                        <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn"
                                            for="radio_option1"><i data-feather="grid" class="font-medium-3"></i></label>
                                        <input type="radio" class="btn-check" name="radio_options" id="radio_option2"
                                            autocomplete="off" checked />
                                        <label class="btn btn-icon btn-outline-primary view-btn list-view-btn"
                                            for="radio_option2"><i data-feather="list" class="font-medium-3"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="body-content-overlay"></div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4 class="card-title">Cek kamar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form class="form">
                                @csrf
                                <div class="row align-items-center col-12">
                                    <div class="col-md-4 mb-1">
                                        <label class="form-label" for="fp-default">Tanggal check-in</label>
                                        <input type="text" id="fp-default" name="check_in"
                                            class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required />
                                    </div>
                                    <div class="col-md-4 mb-1">
                                        <label class="form-label" for="fp-default">Tanggal check-out</label>
                                        <input type="text" id="fp-default" name="check_out"
                                            class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required />
                                    </div>
                                    <div class="col-md-4 row align-items-center">
                                        <label class="form-label col-sm-3" for="price">Total room:</label>
                                        <div class="input-group col-sm-1">
                                            <input type="number" class="touchspin-mi-ma" name="total_room"
                                                value="1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary mt-1 mb-1">Check room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- E-commerce Products Starts -->
                <section id="ecommerce-products" class="list-view">
                </section>
                <section id="ecommerce-pagination">
                </section>
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/extensions/wNumb.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/nouislider.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pagination/jquery.twbsPagination.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-input-mask.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-number-input.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            "use strict";
            let roomData = [{}];
            let dataArray;
            let checkRoomData;
            let paramObj = {
                total_room: searchParams.get('total_room') ? Base64.decode(searchParams.get('total_room')) :
                    false,
                check_out: searchParams.get('check_out') ? Base64.decode(searchParams.get('check_out')) : false,
                check_in: searchParams.get('check_in') ? Base64.decode(searchParams.get('check_in')) : false,
                checkroom: searchParams.get('checkroom') ? Base64.decode(searchParams.get('checkroom')) : false
            };

            $(document).ready(() => {
                getRoomData();
            });

            var touchspinValue = $('.touchspin-mi-ma'),
                counterMin = 1,
                counterMax = 10;
            if (touchspinValue.length > 0) {
                touchspinValue
                    .TouchSpin({
                        min: counterMin,
                        max: counterMax,
                        buttondown_txt: feather.icons['minus'].toSvg(),
                        buttonup_txt: feather.icons['plus'].toSvg()
                    })
                    .on('touchspin.on.startdownspin', function() {
                        var $this = $(this);
                        $('.bootstrap-touchspin-up').removeClass('disabled-max-min');
                        if ($this.val() == counterMin) {
                            $(this).siblings().find('.bootstrap-touchspin-down').addClass('disabled-max-min');
                        }
                    })
                    .on('touchspin.on.startupspin', function() {
                        var $this = $(this);
                        $('.bootstrap-touchspin-down').removeClass('disabled-max-min');
                        if ($this.val() == counterMax) {
                            $(this).siblings().find('.bootstrap-touchspin-up').addClass('disabled-max-min');
                        }
                    });
            }

            const checkRoomDataHasId = (id) => {
                return checkRoomData.find((item, i) => {
                    return item.id === id;
                });
            }

            const getRoomData = () => {
                $.ajax({
                    url: `{{ url('room/api/get') }}`,
                    type: "GET",
                    success: (resp) => {
                        roomData = resp.room;
                    },
                    error: (err) => {
                        console.error(err);
                    }
                });

                if (paramObj.checkroom) {
                    $.ajax({
                        url: `{{ url('room/api/checkroom') }}`,
                        type: "GET",
                        data: {
                            ...paramObj
                        },
                        success: (resp) => {
                            checkRoomData = resp.room;
                        },
                        error: (err) => {
                            console.error(err);
                        }
                    });
                }

                $(document).ajaxComplete(function() {
                    if (paramObj.checkroom) {
                        $('input').each((i, item) => {
                            if (paramObj.hasOwnProperty(item.name)) {
                                $(item).val(paramObj[item.name]);
                            }
                        });

                        $(roomData).each((i, item) => {
                            if (checkRoomDataHasId(item.id) === undefined) {
                                checkRoomData.push({
                                    id: item.id,
                                    total_ordered_room: 0
                                });
                            }
                        });

                        setRoomData(roomData.filter((item, index) => {
                            return (parseInt(item.available_room) -
                                checkRoomDataHasId(item.id)
                                .total_ordered_room -
                                parseInt(paramObj.total_room)) >= 0;
                        }));

                    } else {
                        setRoomData(roomData);
                    }
                });
            }

            const setRoomData = (datas) => {
                let dataPerPage = 4;

                let data = $.map(datas, (item, i) => {
                    let checkRoom = searchParams.get('checkroom') ?
                        '<button href="#" class="btn btn-light btn-checkout btn-delete btn-cart" data-id="' +
                        item.id +
                        '">' +
                        '<span>' + 'Checkout' + '</span>' +
                        '</button>' : "";

                    return '<div class="card ecommerce-card">' +
                        '<div class="item-img text-center">' +
                        '<a class="btn-detail" data-id="' + item.id + '">' +
                        '<img class="img-fluid card-image-top"' +
                        'src="' + item.image + '"/>' +
                        '</a>' +
                        '</div>' +
                        '<div class="card-body">' +
                        '<div class="item-wrapper">' +
                        '</div>' +
                        '<h4 class="text-body">' +
                        '<a class="text-body btn-detail" data-id="' + item.id + '">' +
                        toPascalCase(item.category.name) +
                        '</a>' +
                        '</h4>' +
                        '<div class="item-cost">' +
                        '<h6 class="item-price">' + formatter.format(item.price) + '</h6>' +
                        '</div>' +
                        '<p class="card-text item-description">' +
                        item.description +
                        '</p>' +
                        '</div>' +
                        '<div class="item-options text-center">' +
                        '<div class="item-wrapper">' +
                        '<div class="item-cost">' +
                        '<h4 class="item-price text-align-center">' + formatter.format(item
                            .price) +
                        '</h4>' +
                        '</div>' +
                        '</div>' +
                        checkRoom +
                        '<button class="btn btn-primary btn-detail btn-wishlist" data-id="' + item.id +
                        '">' +
                        '<span class="add-to-cart">' + 'Detail' + '</span>' +
                        '</button>' +
                        '</div>' +
                        '</div>'
                }).join(',');

                dataArray = data.split(',');

                let dataLength =
                    (dataArray.length / dataPerPage) % 1 === 0 ? dataArray.length / dataPerPage : dataArray
                    .length / dataPerPage + 1;

                $('#ecommerce-pagination').twbsPagination({
                    totalPages: dataLength < 1 ? 1 : dataLength,
                    first: null,
                    last: null,
                    onPageClick: (evt, page) => {
                        if (data) {
                            $('#ecommerce-products').html('');
                            $('#ecommerce-products').append(dataArray.filter((item,
                                    index) => page * dataPerPage - dataPerPage <= index &&
                                page * dataPerPage > index));
                            $('.search-results').html(`${dataArray.length} results found`);
                        } else {
                            $('#ecommerce-products').append(
                                '<div class="alert alert-warning" role="alert">' +
                                '<div class="alert-body d-flex align-items-center">' +
                                '<span> It seems like no rooms that available at the date you put or try to decrease the total room.</span>' +
                                '</div>' +
                                '</div>');
                            $('#ecommerce-pagination').html('');
                            $('.search-results').html(`0 results found`);
                        }
                    }
                });
            }

            $(document).delegate('.form', 'submit', (e) => {
                e.preventDefault();

                searchParams.set('total_room', Base64.encode($('[name="total_room"]').val()));
                searchParams.set('check_in', Base64.encode($('[name="check_in"]').val()));
                searchParams.set('check_out', Base64.encode($('[name="check_out"]').val()));
                searchParams.set('checkroom', Base64.encode("true"));

                pushParamsQuery(searchParams.toString());
            });

            $(document).delegate('.btn-detail', 'click', (e) => {
                e.preventDefault();
                const id = e.currentTarget.getAttribute('data-id');

                searchParams.set('room', Base64.encode(id));
                pushParamsQuery(searchParams.toString(), `{{ url('room/detail') }}`);
            });

            $(document).delegate('.btn-checkout', 'click', (e) => {
                e.preventDefault();
                const id = e.currentTarget.getAttribute('data-id');
                const user = `{!! Auth::user()->email_verified_at !!}`;

                if (user) {
                    searchParams.set('room', Base64.encode(id));
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
