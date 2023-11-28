@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-css')
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Create room</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="title">Title</label>
                                                    <input type="text" class="form-control" placeholder="title"
                                                        id="title" name="title" value="{{ $currentData->title }}" />
                                                </div>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="title"></strong>
                                                </span>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="exampleFormControlTextarea1">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                                        placeholder="Textarea">{{ $currentData->description }}</textarea>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="description"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
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
    <!-- END: Content-->
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-js')
    <script type="text/javascript">
        $(function() {
            "use strict";

            $(document).delegate('.form', 'submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize() + `&id={{ $currentData->id }}`;

                $.ajax({
                    type: "POST",
                    url: `{{ url('general/facilities/api/update') }}`,
                    data: formData,
                    dataType: 'json',
                    success: (resp) => {
                        return Swal.fire({
                            icon: 'success',
                            text: 'Data berhasil diedit.',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        }).then(() => {
                            window.location.assign(
                                `{{ url('/general/facilities/data') }}`
                            );
                        });
                    },
                    error: (err) => {
                        console.log(err);
                        Swal.fire({
                            icon: 'error',
                            text: 'Data gagal diedit.',
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
