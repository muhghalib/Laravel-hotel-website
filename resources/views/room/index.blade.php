@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-sliders.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
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
                                        <div class="btn-group dropdown-sort">
                                            <a class="btn btn-outline-primary me-1" href="/room/create">
                                                Create new room
                                            </a>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <input type="radio" class="btn-check" name="radio_options" id="radio_option1"
                                                autocomplete="off" />
                                            <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn"
                                                for="radio_option1"><i data-feather="grid"
                                                    class="font-medium-3"></i></label>
                                            <input type="radio" class="btn-check" name="radio_options" id="radio_option2"
                                                autocomplete="off" checked />
                                            <label class="btn btn-icon btn-outline-primary view-btn list-view-btn"
                                                for="radio_option2"><i data-feather="list"
                                                    class="font-medium-3"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="body-content-overlay"></div>
                    <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control search-product" id="shop-search"
                                        placeholder="Search Room" aria-label="Search..." aria-describedby="shop-search" />
                                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Products Starts -->
                    <section id="ecommerce-products" class="list-view">
                    </section>
                    <section id="ecommerce-pagination">
                    </section>
                    <!-- E-commerce Products Ends -->
                    <!-- E-commerce Pagination Ends -->
                </div>
            </div>
        </div>
    @endsection

    @section('vendor-js')
        <script src="{{ asset('app-assets/vendors/js/extensions/wNumb.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/nouislider.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/pagination/jquery.twbsPagination.min.js') }}"></script>
    @endsection

    @section('page-js')
        <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce.min.js') }}"></script>

        <script type="text/javascript">
            $(function() {
                "use strict";
                let roomData = [{}];
                let dataArray;
                let isDelete = false;
                let currentPage;

                $(document).ready(() => {
                    getRoomData()
                });

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

                    $(document).ajaxComplete(function() {
                        if (searchParams.get('search')) {
                            setRoomData(roomData.filter((item, index) => {
                                return item.category.name.toLowerCase().includes(searchParams
                                        .get(
                                            'search')
                                        .toLowerCase()) || item.price
                                    .includes(searchParams.get('search'));
                            }));
                        } else {
                            setRoomData(roomData);
                        }
                    });
                }

                const setRoomData = (datas) => {
                    let dataPerPage = 4;
                    let data = $.map(datas, (item, i) => {
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
                            '<a class="btn-detail text-body" data-id="' + item.id + '">' +
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
                            '<h4 class="item-price text-align-center">' + formatter.format(item.price) +
                            '</h4>' +
                            '</div>' +
                            '</div>' +
                            '<button class="btn btn-light btn-wishlist btn-delete" data-id="' +
                            item.id +
                            '">' +
                            '<span>' + 'Delete' + '</span>' +
                            '</button>' +
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

                    if (isDelete) {
                        $('#ecommerce-products').html('');
                        $('#ecommerce-products').append(dataArray.filter((item,
                                index) => currentPage * dataPerPage - dataPerPage <= index &&
                            currentPage * dataPerPage > index));
                        $('.search-results').html(`${dataArray.length} results found`);
                        isDelete = false;
                    }

                    $('#ecommerce-pagination').twbsPagination({
                        totalPages: dataLength < 1 ? 1 : dataLength,
                        first: null,
                        last: null,
                        onPageClick: (evt, page) => {
                            currentPage = page;
                            if (data) {
                                $('#ecommerce-products').html('');
                                $('#ecommerce-products').append(dataArray.filter((item,
                                        index) => page * dataPerPage - dataPerPage <= index &&
                                    page * dataPerPage > index));
                                $('.search-results').html(`${dataArray.length} results found`);
                            } else {
                                $('#ecommerce-products').html('');
                                $('#ecommerce-pagination').html('');
                                $('.search-results').html(`0 results found`);
                            }
                        }
                    });
                }

                $('#shop-search').on('keydown', (e) => {
                    if (e.key === "Enter") {
                        searchParams.set("search", e.currentTarget.value);
                        pushParamsQuery(searchParams.toString());
                    }
                });

                $(document).delegate('.btn-detail', 'click', (e) => {
                    e.preventDefault();
                    const id = e.currentTarget.getAttribute('data-id');

                    searchParams.set('room', Base64.encode(id));
                    pushParamsQuery(searchParams.toString(), `{{ url('room/data/detail') }}`);
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
                                        text: 'Data berhasil dihapus.',
                                        customClass: {
                                            confirmButton: 'btn btn-success'
                                        }
                                    }).then(() => {
                                        isDelete = true;
                                        getRoomData();
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

            });
        </script>
    @endsection
