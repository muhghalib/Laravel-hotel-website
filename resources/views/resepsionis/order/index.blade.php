@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/modal-create-app.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.min.css') }}">
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Order data</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Order
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">
                @include('resepsionis.order.modal.paid')
                <!-- table -->
                <div class="card mt-1">
                    <div class="table-responsive">
                        <table class="order-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Tamu</th>
                                    <th>Kamar</th>
                                    <th>Kode pesanan</th>
                                    <th>Jumlah kamar yang dipesan</th>
                                    <th>Harga total</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            'use-strict';
            let orderData;

            const tables = $('.order-table').DataTable({
                ajax: `{{ url('order/api/get') }}`,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'user'
                    },
                    {
                        data: 'room.category.name'
                    },
                    {
                        data: 'order_code'
                    },
                    {
                        data: 'total_room'
                    },
                    {
                        data: (data) => {
                            return formatter.format(data.total_price);
                        }
                    },
                    {
                        data: 'check_in'
                    },
                    {
                        data: 'check_out'
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'id'
                    }
                ],
                columnDefs: [{
                        // For Responsive
                        targets: 0,
                        className: 'control',
                        orderable: false,
                        responsivePriority: 2,
                        targets: 0,
                        render: function(data, type, full, meta) {
                            return '';
                        }
                    },
                    {
                        // User full name and username
                        targets: 1,
                        responsivePriority: 4,
                        render: function(data, type, full, meta) {
                            var $name = full.user.name,
                                $email = full.user.email,
                                $image = full.user.avatar;
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="' + assetPath + 'images/avatars/' +
                                    $image +
                                    '" alt="Avatar" height="32" width="32">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6) + 1;
                                var states = ['success', 'danger', 'warning', 'info',
                                    'dark',
                                    'primary', 'secondary'
                                ];
                                var $state = states[stateNum],
                                    $name = full.user.name,
                                    $initials = $name.match(/\b\w/g) || [];
                                $initials = (($initials.shift() || '') + ($initials
                                        .pop() ||
                                        ''))
                                    .toUpperCase();
                                $output = '<span class="avatar-content">' + $initials +
                                    '</span>';
                            }
                            var colorClass = $image === '' ? ' bg-light-' + $state +
                                ' ' : '';
                            // Creates full output for row
                            var $row_output =
                                '<div class="d-flex justify-content-left align-items-center">' +
                                '<div class="avatar-wrapper">' +
                                '<div class="avatar ' +
                                colorClass +
                                ' me-1">' +
                                $output +
                                '</div>' +
                                '</div>' +
                                '<div class="d-flex flex-column">' +
                                '<span class="fw-bolder">' +
                                $name +
                                '</span>' +
                                '<small class="emp_post text-muted">' +
                                $email +
                                '</small>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    {
                        // User Status
                        targets: 8,
                        render: function(data, type, full, meta) {
                            if (full['is_paid'] && full['deleted_at'] ===
                                null) {
                                return '<span class="badge rounded-pill text-capitalized badge-light-success">order paid</span>';
                            } else if (!full['is_paid'] && full['deleted_at'] ===
                                null) {
                                return '<span class="badge rounded-pill text-capitalized badge-light-warning">order unpaid yet</span>';
                            } else if (full['deleted_at'] !== null) {
                                return '<span class="badge rounded-pill text-capitalized badge-light-secondary">order cancelled</span>';
                            }
                        }
                    },
                    {
                        // Actions
                        targets: 9,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            const button =
                                `<button data-id='${full['id']}' class="dropdown-item btn-delete btn btn-icon w-100">` +
                                feather.icons['trash-2'].toSvg({
                                    class: 'me-50 font-small-4'
                                }) +
                                'Delete' +
                                '</i></button>'

                            return (
                                '<div class="btn-group">' +
                                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons['more-vertical'].toSvg({
                                    class: 'font-small-4'
                                }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-end">' +
                                `<button data-id="${full['id']}" type="button" class="btn-edit dropdown-item btn btn-icon dropdown-item w-100" data-bs-toggle="modal" data-bs-target="#editRoleModal">` +
                                feather.icons['edit'].toSvg({
                                    class: 'me-50 font-small-4'
                                }) +
                                'Edit' +
                                '</i></button>' +
                                button +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                ],
                order: [
                    [2, 'desc']
                ],
                dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75 mb-1"' +
                    '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                    '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f><"check_in mt-50 width-200"><"me-1">>>' +
                    '>t' +
                    '<"d-flex justify-content-between mx-2 row"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                language: {
                    sLengthMenu: 'Show _MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search..'
                },
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details of ' + data['order_code'];
                            }
                        }),
                        type: 'column',
                        renderer: function(api, rowIdx, columns) {
                            var data = $.map(columns, function(col, i) {
                                return col.title !==
                                    '' // ? Do not show row in modal popup if title is blank (for check box)
                                    ?
                                    '<tr data-dt-row="' +
                                    col.rowIdx +
                                    '" data-dt-column="' +
                                    col.columnIndex +
                                    '">' +
                                    '<td>' +
                                    col.title +
                                    ':' +
                                    '</td> ' +
                                    '<td>' +
                                    col.data +
                                    '</td>' +
                                    '</tr>' :
                                    '';
                            }).join('');

                            return data ? $('<table class="table"/>').append('<tbody>' +
                                data +
                                '</tbody>') : false;
                        }
                    }
                },
                language: {
                    paginate: {
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
                initComplete: function() {
                    orderData = this.api().data();

                    this.api()
                        .columns(6)
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<input type="date" id="pd-default" class="form-control" placeholder="2022=09=23" />'
                                )
                                .appendTo('.check_in')
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(
                                        this).val());
                                    column.search(val ? '^' + val + '$' : '', true,
                                            false)
                                        .draw();
                                });
                        });
                }
            });

            $(document).delegate('.btn-delete', 'click', function() {
                const id = $(this).data('id');

                return Swal.fire({
                    text: 'Anda yakin pesanan data ini?, pesanan yang anda hapus tidak akan dapat kembali',
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
                            type: 'post',
                            url: `{{ url('order/api/forcedeletes') }}`,
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
                                    tables.ajax.reload();
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

            $(document).delegate('.btn-edit', 'click', (e) => {
                $('[type="hidden"], [name="id"]').val(e.currentTarget.getAttribute('data-id'));
            });

            $(document).delegate('.edit-paid', 'submit', (e) => {
                e.preventDefault();
                const data = {
                    id: $('[type="hidden"], [name="id"]').val(),
                    is_paid: $('[name="is_paid"]').val() === "on" ? 1 : 0,
                    _token: `{{ csrf_token() }}`
                }

                $.ajax({
                    type: "POST",
                    url: `{{ url('order/api/update') }}`,
                    data: data,
                    dataType: 'json',
                    success: (resp) => {
                        return Swal.fire({
                            icon: 'success',
                            title: 'diedit!',
                            text: 'Pembayaran berhasil diedit.',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        }).then(() => {
                            tables.ajax.reload();
                        });
                    },
                    error: (err) => {
                        console.error(err);
                    }
                })
            });
        });
    </script>
@endsection
