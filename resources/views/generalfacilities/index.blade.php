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
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @include('user.modal.role')
                <h3 class="mt-50">General facilities</h3>
                <p class="mb-2">Find your general facilities hotel and you can edit it also.</p>
                <!-- table -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="general-facilities-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Facilities</th>
                                    <th style="max-height:200px;">Description</th>
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
@endsection

@section('page-js')
    <script type="text/javascript">
        $(function() {
            'use-strict';

            const tables = $('.general-facilities-table').DataTable({
                ajax: `{{ url('general/facilities/api/data') }}`,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: ' '
                    }
                ],
                error: (err) => {
                    console.log(err);
                },
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
                        targets: 2,
                        responsivePriority: 4,
                        render: function(data, type, full, meta) {
                            var $name = full['title'],
                                $image = full['image'];
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="' + $image +
                                    '" alt="Avatar" height="200" width="300">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6) + 1;
                                var states = ['success', 'danger', 'warning', 'info', 'dark',
                                    'primary', 'secondary'
                                ];
                                var $state = states[stateNum],
                                    $name = full['title'],
                                    $initials = $name.match(/\b\w/g) || [];
                                $initials = (($initials.shift() || '') + ($initials.pop() ||
                                        ''))
                                    .toUpperCase();
                                $output = '<span class="avatar-content">' + $initials +
                                    '</span>';
                            }
                            var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : '';
                            // Creates full output for row
                            var $row_output =
                                '<div class="d-flex justify-content-left align-items-center">' +
                                '<div class="avatar-wrapper">' +
                                '<div class="' +
                                colorClass +
                                ' me-1">' +
                                $output +
                                '</div>' +
                                '</div>' +
                                '</div>';
                            return $row_output;
                        }
                    },
                    {
                        // Actions
                        targets: 5,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            const button =
                                `<button data-id='${full['id']}' class="dropdown-item btn-delete btn btn-icon w-100">` +
                                feather.icons['trash-2'].toSvg({
                                    class: 'me-50 font-small-4'
                                }) +
                                'Delete' +
                                '</i></button>';
                            return (
                                '<div class="btn-group">' +
                                '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                feather.icons['more-vertical'].toSvg({
                                    class: 'font-small-4'
                                }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-end">' +
                                `<button data-id="${full['id']}" type="button" class="btn-edit dropdown-item btn btn-icon dropdown-item w-100">` +
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
                buttons: [{
                    text: feather.icons['plus'].toSvg({
                        class: 'me-50 font-small-4'
                    }) + 'Add New Facilities',
                    className: 'create-new btn btn-primary',
                    attr: {},
                    init: function(api, node, config) {
                        $(node).on('click', () => {
                            window.location.assign('/general/facilities/create');
                        });

                        $(node).removeClass('btn-secondary');
                    }
                }],
                dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75 mb-1"' +
                    '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                    '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f><"me-1 mt-50 width-200"B>>>' +
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
                                return 'Details of ' + data['title'];
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

                            return data ? $('<table class="table"/>').append('<tbody>' + data +
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
            });

            $(document).delegate('.btn-delete', 'click', function() {
                const id = $(this).data('id');

                return Swal.fire({
                    title: 'Anda yakin menghapus data ini ?',
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
                            url: `{{ url('general/facilities/api/delete') }}`,
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
                                    tables.ajax.reload();
                                });
                            },
                            error: function(err) {
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
                const id = $(e.currentTarget).data('id');
                searchParams.set('generalfacilities', id);

                pushParamsQuery(searchParams.toString(), `{{ url('general/facilities/edit') }}`)
            });
        })
    </script>
@endsection
