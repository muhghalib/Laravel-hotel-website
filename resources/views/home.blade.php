@extends('layouts.app')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/swiper.min.css') }}">
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/plugins/extensions/ext-component-swiper.min.css') }}">
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- autoplay swiper -->
                <section id="component-swiper-autoplay">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h2 class="text-primary"> Welcome to Ngoktel</h2>
                            </div>
                            <div class="swiper-autoplay swiper-container">
                                <div class="swiper-wrapper swiper-1">
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="card-text mt-1">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>
                </section>
                <section id="general-facilities">
                    <h2 class="text-title text-primary mb-1">General facilities</h2>
                    <div class="row col-12 card-facilities">
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-swiper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-details.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            $(document).ready(() => {
                $.ajax({
                    url: `{{ url('room/api/get') }}`,
                    type: "GET",
                    success: (resp) => {
                        const carouselData = $.map(resp.room, (item, i) => {
                            return '<div class="swiper-slide' + (i === 0 ?
                                    " swiper-slide-active" : "") + '">' +
                                '<img class="img-fluid" src="' + item.image +
                                '" alt="banner" />' +
                                '</div>'
                        }).join('');

                        $('.swiper-1').append(carouselData);
                    },
                    error: (err) => {
                        console.error(err);
                    }
                });

                $.ajax({
                    url: `{{ url('general/facilities/api/get') }}`,
                    type: "GET",
                    success: (resp) => {
                        const generalData = $.map(resp.facilities, (item, i) => {
                            return '<div class="col-md-6 col-xl-4">' +
                                '<div class="card mb-3">' +
                                '<img class="card-img-top" src="' + item.image +
                                '" alt="Card image cap" />' +
                                '<div class="card-body">' +
                                '<h4 class="card-title">' + item.title + '</h4>' +
                                '<p class="card-text">' +
                                item.description +
                                '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        }).join('');

                        $('.card-facilities').append(generalData);
                    },
                    error: (err) => {
                        console.error(err);
                    }
                });

            });
        });
    </script>
@endsection
