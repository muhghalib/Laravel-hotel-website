@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-number-input.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/modal-create-app.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-50">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Order list</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Order</a>
                                    </li>
                                    <li class="breadcrumb-item active">List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="place-order" class="list-view">
                    <div class="checkout-items">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/forms/form-number-input.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-checkout.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-edit-user.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            let userOrder;
            let filteredUserOrder;

            $(document).ready(() => {
                getUserOrder();
            });

            const getUserOrder = () => {
                $.ajax({
                    type: "GET",
                    url: `{{ url('order/tamu/api/get') }}`,
                    success: (resp) => {
                        userOrder = resp.userOrder;
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });

                $(document).ajaxComplete(() => {
                    if (userOrder.length === 0) {
                        $('.checkout-items').append('<div class="alert alert-primary" role="alert">' +
                            '<div class="alert-body d-flex align-items-center">' +
                            '<span> You don`t have any order yet.</span>' +
                        '</div>' +
                        '</div>');
                } else {
                    setUserOrderData(userOrder);
                }
            });
        }

        const setUserOrderData = (arrData) => {
            const data = $.map(arrData, (item, i) => {
                const status = item.is_paid ?
                    '<span class="badge rounded-pill badge-light-success">It has been paid</span>' :
                    '<span class="badge rounded-pill badge-light-warning">Unpaid</span>';

                const cancelButton = !item.is_paid ?
                    '<button type="button" class="btn btn-light mt-1 remove-wishlist btn-remove" data-id="' +
                    item.id + '">' +
                    '<span>Cancel</span>' +
                    '</button>' : '';

                return '<div class="card ecommerce-card">' +
                    '<a class="btn-detail" data-id="' + item.room.id + '">' +
                    '<img src="' + item.room.image +
                    '" alt="img-placeholder" class="img-fluid card-image-top" />' +
                    '</a>' +
                    '<div class="card-body">' +
                    '<div class="item-name">' +
                    '<h4 class="mb-0">' +
                    '<a class="btn-detail text-body" data-id="' + item.room.id + '">' +
                    toPascalCase(item.room
                        .category.name) +
                    '</a>' + '</h4>' +
                    '<span class="item-company">' + 'Created at, ' +
                    '<span class="text-primary" style="margin-left:6px;">' +
                    item.created_at.split('T')[0] + '</span>' + '</span>' +
                    '</div>' +
                    '<div class="item-quantity mt-1">' +
                    '<span class="quantity-title">Total room:</span>' +
                    '<div class="quantity-counter-wrapper">' +
                    '<div class="input-group bootstrap-touchspin disabled-touchspin">' +
                    '<span class="input-group-btn bootstrap-touchspin-injected">' +
                    '<button class="btn btn-primary bootstrap-touchspin-down" type="button">' +
                    '-' +
                    '</button>' + '</span>' +
                    '<input type="text" class="quantity-counter form-control" value="' + item
                    .total_room + '" disables>' +
                    '<span class="input-group-btn bootstrap-touchspin-injected">' +
                    '<button class="btn btn-primary bootstrap-touchspin-up" type="button">' + '+' +
                    '</button>' + '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<span class="delivery-date text-primary mt-2">' + 'Check-In, ' + item
                    .check_in + '</span>' +
                    '<small class="text-success text-muted">' + 'Until, ' + item.check_out +
                    '</small>' +
                    '</div>' +
                    '<div class="item-options text-center">' +
                    '<div class="item-wrapper">' +
                    '<div class="item-cost">' +
                    '<h4 class="item-price">' +
                    formatter.format(item.total_price) +
                    '</h4>' +
                    '<p class="card-text shipping">' +
                    status +
                    '</p>' +
                    '</div>' +
                    '</div>' +
                    cancelButton +
                    '<button type="button" class="btn btn-primary btn-cart btn-struk" data-id="' +
                    item.id + '" data-bs-toggle="modal" data-bs-target="#editUser">' +
                    '<span class="text-truncate">See order receipt</span>' +
                    '</button>' +
                    '</div>' +
                    '</div>'
            });

            $('.checkout-items').html('');
            $('.checkout-items').append(data);
        }

        const dataModal = (data) => {
            const date = new Date(data.created_at);
            return '<div class="col-12 overflow-auto">' +
                '<div class="card-developer-meetup">' +
                '<div class="meetup-img-wrapper rounded-top text-center">' +
                '<img src="' + data.room.image + '" alt="" height="170" />' +
                '</div>' +
                '<div class="card-body">' +
                '<div class="meetup-header d-flex align-items-center">' +
                '<div class="meetup-day">' +
                '<h6 class="mb-0">' + date.toString().split(' ')[0] + '</h6>' +
                '<h3 class="mb-0">' + date.toString().split(' ')[2] + '</h3>' +
                '</div>' +
                '<div class="my-auto">' +
                '<h4 class="card-title mb-25">' + '<a class="btn-detail text-primary" data-id="' + data
                .room
                .id + '">' +
                data.room.category.name + '</a>' + '</h4>' +
                '<p class="card-text mb-0">' + 'Total room: ' + data.total_room + '</p>' +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-row meetings">' +
                '<div class="avatar bg-light-primary rounded me-1">' +
                '<div class="avatar-content">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar avatar-icon font-medium-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>' +
                '</div>' +
                '</div>' +
                '<div class="content-body">' +
                '<h6 class="mb-0">' + 'Checkin, ' + data.check_in + '</h6>' +
                '<small>' + 'Until, ' + data.check_out + '</small>' +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-row meetings">' +
                '<div class="avatar bg-light-primary rounded me-1">' +
                '<div class="avatar-content">' +
                '<div class="avatar-content">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon font-medium-3"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="content-body">' +
                '<h6 class="mb-0">Total price</h6>' +
                '<small>' + formatter.format(data.total_price) + '</small>' +
                '</div>' +
                '</div>' +
                '<div class="d-flex flex-row meetings">' +
                '<div class="avatar bg-light-primary rounded me-1">' +
                '<div class="avatar-content">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card avatar-icon font-medium-3"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>' +
                '</div>' +
                '</div>' +
                '<div class="content-body">' +
                '<h6 class="mb-0">Payment code</h6>' +
                '<small>' + data.order_code + '</small>' +
                '</div>' +
                '</div>' +
                '<div class="alert ' + (data.is_paid ? "alert-success" : "alert-primary") +
                ' mt-2" role="alert">' +
                '<div class="alert-body d-flex align-items-center">' +
                '<span>' + (!data.is_paid ? "Give this receipt to the resepsionist to pay it" :
                    "You have been paid this room") + '</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
        }

        $(document).delegate('.btn-remove', 'click', function() {
            const id = $(this).data('id');

            return Swal.fire({
                text: 'Anda yakin akan menghapus pesanan ini?, kemungkinan akan ada yang mengambil tanggal yang sudah anda pilih',
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
                        url: `{{ url('order/softdeletes') }}`,
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
                                getUserOrder();
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

        $(document).delegate('.btn-detail', 'click', (e) => {
            e.preventDefault();
            const id = e.currentTarget.getAttribute('data-id');

            searchParams.set('room', Base64.encode(id));
            pushParamsQuery(searchParams.toString(), `{{ url('room/detail') }}`);
            });

            $(document).delegate('.btn-struk', 'click', (e) => {
                const id = e.currentTarget.getAttribute('data-id');

                filteredUserOrder = userOrder.filter((item, i) => {
                    return item.id === parseInt(id);
                });

                $('.modal-body').html('');
                $('.modal-body').append(dataModal(filteredUserOrder[0]));

            });

        });
    </script>
@endsection
