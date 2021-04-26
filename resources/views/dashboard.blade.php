@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-speaker font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">58</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Equipment</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-map font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">3</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Zone</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="mdi mdi-water-outline font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">35</span> liters</h3>
                            <p class="text-muted mb-1 text-truncate">Water Used</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-activity font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">13</span></h3>
                            <p class="text-muted mb-1 text-truncate">Today's Active</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box pb-2">
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-xs btn-light">Today</button>
                        <button type="button" class="btn btn-xs btn-light">Weekly</button>
                        <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
                    </div>
                </div>

                <h4 class="header-title mb-3">Temperature And Humidity</h4>

                <div dir="ltr">
                    <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-3">Top 5 Equipment Most Used</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                        <thead class="thead-light">
                            <tr>
                                <th>Equipment Name</th>
                                <th>Description</th>
                                <th>Last active</th>
                                <th>Water Used</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Equipment1</h5>
                                    <p class="mb-0 text-muted"><small>Garden</small></p>
                                </td>

                                <td>
                                    khong co
                                </td>

                                <td>
                                    14:33:31 26/04/2021
                                </td>

                                <td>
                                    130
                                </td>

                                <td>
                                    32
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title mb-3">History</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                        <thead class="thead-light">
                            <tr>
                                <th>Equipment Name</th>
                                <th>Zone</th>
                                <th>Controlled By</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="m-0 font-weight-normal">Equipment 1</h5>
                                </td>

                                <td>
                                    Garden
                                </td>

                                <td>
                                    luong van quyen
                                </td>

                                <td>
                                    14:33:31 26/04/2021
                                </td>

                                <td>
                                    <span class="badge bg-soft-success text-success">Auto</span>
                                </td>
                           
                            </tr>

                        </tbody>
                    </table>
                </div> <!-- end .table-responsive-->
            </div> <!-- end card-box-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection

@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/libs/selectize/selectize.min.js')}}"></script>

<!-- Dashboar 1 init js-->
<script src="{{asset('assets/js/pages/dashboard-1.init.js')}}"></script>
@endsection