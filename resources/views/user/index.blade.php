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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/modal-create-app.min.css') }}">
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
                <h3 class="mt-50">User Data</h3>
                <p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" name="user"></h3>
                                    <span>Total Users</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" name="inactive-user"></h3>
                                    <span>Inactive User</span>
                                </div>
                                <div class="avatar cursor-default bg-light-danger p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-plus" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" name="active-user"></h3>
                                    <span>Active Users</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75" name="unverified-user"></h3>
                                    <span>Unverified Users</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content">
                                        <i data-feather="user-x" class="font-medium-4"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="user-table table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Role</th>
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
    <script src="{{ asset('app-assets/js/scripts/pages/modal-edit-permission.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
@endsection

@section('page-js')
    <script type="text/javascript">
        $(function() {
            'use-strict';

            let userInfo = {
                user: 0,
                'active-user': 0,
                'inactive-user': 0,
                'unverified-user': 0
            };

            const getUserData = () => {
                $.ajax({
                    url: `{{ url('user/api/get') }}`,
                    type: 'GET',
                    success: (resp) => {
                        userInfo = {
                            ...userInfo,
                            user: resp.user.length,
                            'active-user': resp.user.filter((item, index) => {
                                return item.email_verified_at !== null && item
                                    .deleted_at === null;
                            }).length,
                            'inactive-user': resp.user.filter((item, index) => {
                                return item.deleted_at !== null;
                            }).length,
                            'unverified-user': resp.user.filter((item, index) => {
                                return item.email_verified_at === null && item
                                    .deleted_at === null;
                            }).length
                        }
                        $('h3').each((index, item) => {
                            if (userInfo.hasOwnProperty(item.getAttribute('name'))) {
                                item.textContent = userInfo[item.getAttribute('name')];
                            }
                        });
                    },
                    error: (err) => {
                        console.error(err);
                    }
                });
            }

            $(document).ready(() => {
                getUserData();
            });

            const tables = $('.user-table').DataTable({
                ajax: `{{ url('user/api/data') }}`,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'role'
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
                            var $name = full['name'],
                                $email = full['email'],
                                $image = full['avatar'];
                            if ($image) {
                                // For Avatar image
                                var $output =
                                    '<img src="' + assetPath + 'images/avatars/' + $image +
                                    '" alt="Avatar" height="32" width="32">';
                            } else {
                                // For Avatar badge
                                var stateNum = Math.floor(Math.random() * 6) + 1;
                                var states = ['success', 'danger', 'warning', 'info', 'dark',
                                    'primary', 'secondary'
                                ];
                                var $state = states[stateNum],
                                    $name = full['name'],
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
                        // User Role
                        targets: 2,
                        render: function(data, type, full, meta) {
                            var $role = full['role'];
                            var roleBadgeObj = {
                                tamu: feather.icons['user'].toSvg({
                                    class: 'font-medium-3 text-primary me-50'
                                }),
                                resepsionis: feather.icons['database'].toSvg({
                                    class: 'font-medium-3 text-success me-50'
                                }),
                                admin: feather.icons['slack'].toSvg({
                                    class: 'font-medium-3 text-danger me-50'
                                })
                            };
                            return "<span class='text-truncate align-middle'>" + roleBadgeObj[
                                $role] + $role + '</span>';
                        }
                    },
                    {
                        // User Status
                        targets: 3,
                        render: function(data, type, full, meta) {
                            if (full['email_verified_at'] === null && full['deleted_at'] === null) {
                                return '<span class="badge rounded-pill text-capitalized badge-light-warning">unverified</span>';
                            } else if (full['email_verified_at'] !== null && full['deleted_at'] ===
                                null) {
                                return '<span class="badge rounded-pill text-capitalized badge-light-success">active</span>';
                            } else if (full['deleted_at'] !== null) {
                                return '<span class="badge rounded-pill text-capitalized badge-light-secondary">inactive</span>';
                            }
                        }
                    },
                    {
                        // Actions
                        targets: 4,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            const button = full['deleted_at'] === null ?
                                `<button data-id='${full['id']}' class="dropdown-item btn-delete btn btn-icon w-100">` +
                                feather.icons['trash-2'].toSvg({
                                    class: 'me-50 font-small-4'
                                }) +
                                'Delete' +
                                '</i></button>' :
                                `<button data-id='${full['id']}' class="dropdown-item btn btn-icon btn-restore w-100">` +
                                feather.icons['file-text'].toSvg({
                                    class: 'me-50 font-small-4'
                                }) +
                                'Restore' +
                                '</i></button>';

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
                    '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f><"user_role mt-50 width-200"><"me-1">>>' +
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
                                return 'Details of ' + data['name'];
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
                initComplete: function() {
                    // Adding role filter once table initialized
                    this.api()
                        .columns(2)
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
                                )
                                .appendTo('.user_role')
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d +
                                        '" class="text-capitalize">' + d +
                                        '</option>');
                                });
                        });
                }
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
                            url: `{{ url('user/api/delete') }}`,
                            type: 'post',
                            data: {
                                _token: `{{ csrf_token() }}`,
                                id
                            },
                            success: function(resp) {
                                getUserData();
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

            $(document).delegate('.btn-restore', 'click', function() {
                const id = $(this).data('id');

                return Swal.fire({
                    title: 'Anda yakin akan mengembalikan data ini ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya !',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ms-1'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: `{{ url('user/api/restore') }}`,
                            type: 'post',
                            data: {
                                _token: `{{ csrf_token() }}`,
                                id
                            },
                            success: function(resp) {
                                getUserData();
                                return Swal.fire({
                                    icon: 'success',
                                    title: 'kembali!',
                                    text: 'Data berhasil dikembalikan.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(() => {
                                    tables.ajax.reload();
                                });
                            },
                            error: function(err) {
                                console.log(err);
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Data gagal dikembalikan.',
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

            $(document).delegate('.edit-role', 'submit', (e) => {
                e.preventDefault();
                const data = {
                    id: $('[type="hidden"], [name="id"]').val(),
                    role: $('[name="role"]').val(),
                    _token: `{{ csrf_token() }}`
                }

                $.ajax({
                    type: "POST",
                    url: `{{ url('user/api/update') }}`,
                    data: data,
                    dataType: 'json',
                    success: (resp) => {
                        getUserData();
                        return Swal.fire({
                            icon: 'success',
                            title: 'diedit!',
                            text: 'Role berhasil diedit.',
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
        })
    </script>
@endsection
