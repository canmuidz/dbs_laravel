@extends('layouts.account')

@section('css')



@endsection

@section('content')
<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold m-0">Ecommerce</h4>
    </div>
</div>

<!-- start row -->
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="row g-3">

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1 text-muted">Today's New Order</div>
                                </div>

                                <div class="d-flex align-items-baseline mb-0">
                                    <div class="fs-20 mb-0 me-2 fw-semibold text-dark">1,585</div>
                                </div>
                            </div>

                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div id="new-orders" class="apex-charts"></div>
                            </div>
                        </div>

                        <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                            <span class="me-2 d-flex align-content-center fw-medium text-success">
                                +39.40%
                                <i data-feather="trending-up" class="ms-2" style="height: 22px; width: 22px;"></i>
                            </span>
                            <span class="fw-medium me-1 d-flex">Increased</span>
                            Order
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1 text-muted">Today's Sales</div>
                                </div>

                                <div class="d-flex align-items-baseline mb-0">
                                    <div class="fs-20 mb-0 me-2 fw-semibold text-dark">76,524</div>
                                </div>
                            </div>

                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div id="sales-report" class="apex-charts"></div>
                            </div>
                        </div>

                        <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                            <span class="me-2 d-flex align-content-center fw-medium text-danger">
                                -18.06%
                                <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                            </span>
                            <span class="fw-medium me-1 d-flex">Decrease</span>
                            Sales
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1 text-muted">Today's Revenue</div>
                                </div>

                                <div class="d-flex align-items-baseline mb-0">
                                    <div class="fs-20 mb-0 me-2 fw-semibold text-dark">$11,1585</div>
                                </div>
                            </div>

                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div id="revenue" class="apex-charts"></div>
                            </div>
                        </div>

                        <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                            <span class="me-2 d-flex align-content-center fw-medium text-success">
                                +32.40%
                                <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                            </span>
                            <span class="fw-medium me-1 d-flex">Increased</span>
                            Revenue
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="fs-14 mb-1 text-muted">Today's Expenses</div>
                                </div>

                                <div class="d-flex align-items-baseline mb-0">
                                    <div class="fs-20 mb-0 me-2 fw-semibold text-dark">$21,525</div>
                                </div>
                            </div>

                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div id="expenses" class="apex-charts"></div>
                            </div>
                        </div>

                        <p class="d-flex align-content-center border-top mb-0 pt-3 mt-3">
                            <span class="me-2 d-flex align-content-center fw-medium text-success">
                                +32.40%
                                <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                            </span>
                            <span class="fw-medium me-1 d-flex">Increased</span>
                            Expenses
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div> <!-- end sales -->
</div> <!-- end row -->

@endsection
@section('js')

@endsection