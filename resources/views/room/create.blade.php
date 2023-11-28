@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-file-uploader.min.css') }}">
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
                                            <div class="col-12 mb-2">
                                                <p class="mt-1">Upload hotel room image</p>
                                                <div class="dropzone dropzone-area" id="fileUpload">
                                                    <div class="dz-message">
                                                        <h3 class="">Drop room image</h3>
                                                    </div>
                                                </div>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="image"></strong>
                                                </span>
                                            </div>
                                            <input type="hidden" value="" name="image" />
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="selectDefault">Category</label>
                                                    <select class="form-select" id="selectDefault" name="room_category_id">
                                                        <option selected hidden value="">Select category</option>
                                                        @foreach ($room_category as $data)
                                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="room_category_id"></strong>
                                                </span>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label" for="price">Price</label>
                                                <input type="text" class="form-control numeral-mask" placeholder="10,000"
                                                    id="price" name="price" />
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="price"></strong>
                                                </span>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="exampleFormControlTextarea1">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                                        placeholder="Textarea"></textarea>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="description"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div>Total room and max guest</div>
                                                <div class="mb-2">
                                                    <div class="demo-inline-spacing col-sm-6 col-md-12">
                                                        <label class="form-label" for="price">Max guest:</label>
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin" value="0"
                                                                name="max_guest" />
                                                        </div>
                                                        <label class="form-label" for="price">Available room:</label>
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin" value="0"
                                                                name="available_room" />
                                                        </div>
                                                        <label class="form-label" for="price">Bed room:</label>
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin" value="0"
                                                                name="total_bed_room" />
                                                        </div>
                                                        <label class="form-label" for="price">Bathroom:</label>
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin" value="0"
                                                                name="total_bath_room" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <p>Select facilities</p>
                                                <div class="row gap-1">
                                                    <div class="col-md-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="wifi" id="inlineRadio1" value="" />
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Wifi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="king_bed" id="inlineRadio1" value="" />
                                                            <label class="form-check-label" for="inlineRadio1">King
                                                                bed</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="twin_bed" id="inlineRadio1" value="" />
                                                            <label class="form-check-label" for="inlineRadio1">Twin
                                                                bed</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="bathtub" id="inlineRadio1" value="" />
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Bathtub</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="refrigator" id="inlineRadio1" value="" />
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">refrigator</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="ac" id="inlineRadio1" value="" />
                                                            <label class="form-check-label" for="inlineRadio1">Ac</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="minibar" id="inlineRadio1" value="" />
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Minibar</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="kitchen" id="inlineRadio1" value="" />
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Kitchen</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="include_breakfast" id="inlineRadio1"
                                                                value="" />
                                                            <label class="form-check-label" for="inlineRadio1">Include
                                                                breakfast</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="television" id="inlineRadio1" value="" />
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Television</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
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
    <script src="{{ asset('app-assets/vendors/js/file-uploaders/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/forms/form-input-mask.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-number-input.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-file-uploader.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            let imageUrl;
            $('#fileUpload').dropzone({
                url: '/',
                addRemoveLinks: true,
                maxFiles: 1,
                maxFileSize: 100,
                autoProcessQueue: false,
                uploadMultiple: false,
                accept: (file) => {
                    let fileReader = new FileReader();
                    fileReader.readAsDataURL(file);

                    fileReader.onloadend = e => {
                        let content = e.target.result;
                        imageUrl = content.replace(/^data:image\/[a-z]+;base64,/, '').replace(' ',
                            '+');
                        $("[name='image']").val(imageUrl);
                        file.previewElement.classList.add("dz-success");
                    }
                    file.previewElement.classList.add("dz-complete");
                },
                init: () => {

                    $('[type="checkbox"]').each((index, item) => {
                        $(item).on('change', (e) => {
                            e.currentTarget.value = e.currentTarget.checked ? 1 : 0;
                        });
                    });

                    $(document).delegate('.form', 'submit', function(e) {
                        e.preventDefault();
                        const formData = $(this).serialize().replace(/%2C/g, '');

                        $.ajax({
                            type: "POST",
                            url: `{{ url('room/api/store') }}`,
                            data: formData,
                            dataType: 'json',
                            success: (resp) => {
                                return Swal.fire({
                                    icon: 'success',
                                    text: 'Data berhasil ditambahkan.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(() => {
                                    window.location.assign(
                                        `{{ url('/room/data') }}`);
                                });
                            },
                            error: (err) => {
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
                }
            })
        })
    </script>
@endsection
