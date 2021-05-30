@extends('layouts.vertical', ['title' => 'Datatables'])

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">Environment</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Environment</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Environment</h4>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Equipment</th>
                                    <th>Position</th>
                                    <th>Humidity</th>
                                    <th>Temperature</th>
                                    <th>TimeStamp</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                <tr>
                                    <td>may tuoi cay 1</td>
                                    <td>vuon hoa da lat</td>
                                    <td>20</td>
                                    <td>61</td>
                                    <td>2011/04/25 14:23:43</td>
                                    <td>
                                        <span class="badge badge-success">Active</span>
                                        {{-- <span class="badge bg-soft-danger text-danger">Inactive</span> --}}
                                    </td>
                                </tr>
                                @foreach ($environments as $environment)

                                <tr>
                                    <td>{{ $environment->equipment->name}}</td>
                                    <td>{{ $environment->equipment->zone->name}}</td>
                                    <td>{{ $environment->humidity}}</td>
                                    <td>{{ $environment->temperature}}</td>
                                    <td>{{ $environment->created_at}}</td>
                                    <td>
                                        @if ($environment->equipment->status)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge bg-soft-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->




    </div> <!-- container -->
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection