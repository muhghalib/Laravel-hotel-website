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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Room Category</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/room/data">Room</a>
                                    </li>
                                    <li class="breadcrumb-item active">Category
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-wrap-reverse content-body">
                <div class="col-sm-8 h-100">
                    <section id="ajax-datatable">
                        <div class="card md-table-responsive">
                            <div class="row">
                                <div class="col-12">
                                    <table class="user-table table">
                                        <thead class="table-light">
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-sm-4">
                    <div class="card justify-content-center align-items-center">
                        <div class="bg-black w-full" style="height:2px;"></div>
                        <div class="col-12">
                            <div class="card-body row">
                                <form class="create-category">
                                    @csrf
                                    <div class="row mb-1">
                                        <div class="col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">category</label>
                                                <input type="text" name="name" class="form-control form-control-md"
                                                    placeholder="" name="fname-column">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="name"></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn col-md-4 btn-primary me-1 waves-effect waves-float waves-light mb-1">Tambah</button>
                                        <button type="reset"
                                            class="btn btn-outline-secondary waves-effect col-md-4 mb-1">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
            'use strict';
            let dataCategory = [{}];
            let filteredData = [{}];

            const getDataCategory = () => {
                $.ajax({
                    url: `{{ url('room/category/api/get') }}`,
                    type: 'get',
                    success: (resp) => {
                        dataCategory = resp.room_category;
                    },
                    error: (resp) => {
                        consol.error(err);
                    }
                });
            }

            $(document).ready(function() {
                getDataCategory();
            });

            $(document).ready(() => {
                getDataCategory();
            });

            const tables = $('.user-table').DataTable({
                ajax: `{{ url('room/category/api/data') }}`,
                columns: [{
                        data: ""
                    },
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name'
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
                        // Actions
                        targets: 3,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return (
                                '<div class="d-inline-flex">' +
                                '<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">' +
                                feather.icons['more-vertical'].toSvg({
                                    class: 'font-small-4'
                                }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-end">' +
                                '<a href="/room/data?search=' + full['name'] +
                                '" class="dropdown-item">' +
                                feather.icons['file-text'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Details</a>' +
                                '<button class="dropdown-item delete-record w-100 btn-delete" data-id="' +
                                full["id"] + '">' +
                                feather.icons['trash-2'].toSvg({
                                    class: 'font-small-4 me-50'
                                }) +
                                'Delete</button>' +
                                '</div>' +
                                '</div>' +
                                '<button class="item-edit btn btn-icon btn-edit" data-id="' +
                                full["id"] + '">' +
                                feather.icons['edit'].toSvg({
                                    class: 'font-small-4'
                                }) +
                                '</button>'
                            );
                        }
                    }
                ],
                order: [
                    [2, 'desc']
                ],
                dom: '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75 mb-1"' +
                    '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                    '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1">>>' +
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

                            return data ? $('<table class="table"/>').append('<tbody>' +
                                data + '</tbody>') : false;
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
                    text: 'Anda yakin akan menghapus data ini, ini akan menghapus semua kamar dengan category yang sama',
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
                            url: `{{ url('room/category/api/delete') }}`,
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
                                    tables.ajax.reload();
                                });
                            },
                            error: function(err) {
                                console.error(err);
                                return Swal.fire({
                                    icon: 'error',
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

            /*edit button*/
            $(document).delegate('.btn-edit', 'click', function(e) {
                e.preventDefault();

                const dataId = $(this).data('id');
                filteredData = dataCategory.filter(function(item) {
                    return item.id === dataId;
                });

                !$('.create-category').hasClass('edit-category') && $('.create-category').addClass(
                    'edit-category');
                $("[name='name']").val(filteredData[0].name);
                $("[type='submit']").text("Edit");
                $("[type='reset']").text("Batal");
            });

            /*reset button*/
            $("[type='reset']").on('click', function(event) {
                if (event.currentTarget.textContent === "Batal") {
                    $("[type='submit']").text("Tambah");
                    $('.create-category').removeClass('edit-category');
                    $("[name='name']").val(" ");
                    $(this).text("Reset")
                }
            });

            $(document).delegate('.edit-category', 'submit', function(e) {
                e.preventDefault();
                const data = $(this).serialize() + `&id=${filteredData[0].id}`;
                $.ajax({
                    url: `{{ url('room/category/api/update') }}`,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(resp) {
                        return Swal.fire({
                            icon: 'success',
                            text: "Data berhasil diedit",
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        }).then(() => {
                            getDataCategory();
                            tables.ajax.reload();
                            $("strong").each((index, item) => {
                                $(`[name='${item.className}']`).removeClass(
                                    "is-invalid");
                            });
                            $("[name='name']").val(' ');
                            $('.create-category').removeClass('edit-category');
                            $('.btn, .btn-primary, .me-1').text("Tambah");
                            $("[type='reset']").text("Reset");
                        });
                    },
                    error: function(err) {
                        console.log(err);
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
                        return Swal.fire({
                            icon: 'error',
                            text: 'Data gagal diedit.',
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            }
                        });
                    }
                });
            });

            /*Add and Edit data*/
            $(document).delegate(".create-category", "submit", function(e) {
                e.preventDefault();
                const data = $(this).serialize();

                if (!$('.create-category').hasClass('edit-category')) {
                    $.ajax({
                        url: `{{ url('room/category/api/store') }}`,
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                        success: function(resp) {
                            return Swal.fire({
                                icon: 'success',
                                title: `Ditambah`,
                                text: `Data berhasil ditambahkan`,
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                            }).then(() => {
                                getDataCategory();
                                $("strong").each((index, item) => {
                                    $(`[name='${item.className}']`).removeClass(
                                        "is-invalid");
                                });
                                $("[name='name']").val(" ");
                                tables.ajax.reload();
                            });
                        },
                        error: function(err) {
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
                            return Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                }
                            });
                        }
                    });
                }
            });
        })
    </script>
@endsection
