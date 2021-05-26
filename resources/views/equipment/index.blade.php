@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/jquery-toast-plugin/jquery-toast-plugin.min.css')}}" rel="stylesheet"
    type="text/css" />
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
                        <li class="breadcrumb-item active">Equipments</li>
                    </ol>
                </div>
                <h4 class="page-title">Equipments</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{session('success')}}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <button type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right"
                    data-toggle="modal" data-target="#custom-modal">
                    <i class="mdi mdi-plus-circle"></i> Add Equipment
                </button>
                <h4 class="header-title mb-4">Manage Equipment</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                    <thead>
                        <tr>
                            <th>Equipment Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Age</th>
                            <th>Zone</th>
                            <th>Status</th>
                            <th>Last Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($equipments as $equipment)
                        <tr>
                            <td>
                                {{ $equipment->name }}
                            </td>

                            <td>
                                {{ $equipment->description }}
                            </td>

                            <td>
                                {{ $equipment->image }}
                            </td>

                            <td>

                            </td>

                            <td>
                                @if ($equipment->zone)
                                {{ $equipment->zone->name }}
                                @endif
                            </td>

                            <td>
                                @if ($equipment->status)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge bg-soft-danger text-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                01/04/2017
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                        class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                        data-toggle="dropdown" aria-expanded="false"><i
                                            class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="/equipment/{{$equipment->slug}}">
                                            <i
                                                class="fe-settings mr-2 text-muted font-18 vertical-middle"></i>Settings</a>
                                        <a class="dropdown-item" onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $equipment->slug }}').submit();">
                                            <i
                                                class="mdi mdi-trash-can-outline mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                Equipment 1
                            </td>

                            <td>
                                may moc doi cu, can thay dau 2 lan 1 tuan
                            </td>

                            <td>
                                khong co
                            </td>

                            <td>
                                34
                            </td>

                            <td>
                                Zone1
                            </td>

                            <td>
                                <span class="badge badge-success">Active</span>
                                {{-- <span class="badge bg-soft-danger text-danger">Inactive</span> --}}
                            </td>

                            <td>
                                01/04/2017
                            </td>

                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);"
                                        class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                        data-toggle="dropdown" aria-expanded="false"><i
                                            class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">
                                            <i
                                                class="fe-settings mr-2 text-muted font-18 vertical-middle"></i>Settings</a>
                                        <a class="dropdown-item" href="#">
                                            <i
                                                class="mdi mdi-trash-can-outline mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Add New Equipment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form method="post" action="/equipment">
                    @csrf
                    <div class="form-group">
                        <label for="name">Equipment Name</label>
                        <input autocomplete="off" type="text" class="form-control" id="name" name="name" placeholder="Enter equipment name"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Token</label>
                        <div class="input-group input-group-merge">
                            <input autocomplete="off" type="password" id="password" class="form-control" placeholder="Enter your token"
                                name="token" required>
                            <div class="input-group-append" data-password="false">
                                <div class="input-group-text">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-select">Zone</label>
                        <select class="form-control" id="example-select" name="zone_id">
                            @foreach ($zones as $zone)
                            <option value={{ $zone->id }}>{{ $zone->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group ">
                        <label>image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input autocomplete="off" type="file" class="custom-file-input" id="inputGroupFile04" name="image">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@foreach ($equipments as $equipment)
<form id="delete-form-{{ $equipment->slug }}" action="{{ action('EquipmentController@destroy', $equipment->slug) }}"
    method="POST" style="display: none;">
    @method('DELETE')
    @csrf
</form>
@endforeach
@endsection

@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/tickets.js')}}"></script>
@endsection