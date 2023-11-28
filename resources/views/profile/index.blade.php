@extends('layouts.app')

@section('vendor-css')
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
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0 mx-auto">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2"
                                                src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                                height="110" width="110" alt="User avatar" />
                                            <div class="user-info text-center">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <span class="badge bg-light-secondary">{{ Auth::user()->role }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Username:</span>
                                                <span>{{ Auth::user()->username }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Billing Email:</span>
                                                <span>{{ Auth::user()->email }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Status:</span>
                                                <span class="badge status-badge"></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Role:</span>
                                                <span>{{ Auth::user()->role }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Total order:</span>
                                                <span>{{ count($orderEachUser) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
@endsection

@section('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/app-user-view-account.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-user-view.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $(document).ready(() => {
                if (`{!! Auth::user()->email_verified_at !!}` === null && `{!! Auth::user()->deleted_at !!}` === '') {
                    $('.status-badge').text('unverified').addClass('badge-light-warning')
                } else if (`{!! Auth::user()->email_verified_at !!}` !== null && `{!! Auth::user()->deleted_at !!}` ===
                    '') {
                    $('.status-badge').text('verified').addClass('badge-light-success');
                }
            });
        });
    </script>
@endsection
