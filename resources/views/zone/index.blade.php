@extends('layouts.vertical', ['title' => 'Zone'])

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Zone</li>
                    </ol>
                </div>
                <h4 class="page-title">Zone</h4>
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
        <div class="col-xl-12">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <input autocomplete="off" type="search" class="form-control" id="inputPassword2"
                                        placeholder="Search...">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-right mt-3 mt-lg-0">
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                    data-toggle="modal" data-target="#custom-modal"><i
                                        class="mdi mdi-plus-circle mr-1"></i> Add New</button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->

            <div class="card-box mb-2">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="d-flex align-self-center mr-3 rounded-circle"
                                src="{{url('https://previews.123rf.com/images/veremeev/veremeev1604/veremeev160400081/57030084-field-of-spring-tulips-flowers-is-a-lot-of-bright-mature-flowers-flower-bed-bright-flower-scorching-.jpg')}}"
                                alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h4 class="mt-0 mb-2 font-16">Zone 1</h4>
                                <p class="mb-1"><b>Location:</b> dau do o ha noi</p>
                                <p class="mb-0"><b>Description:</b> vuon hoa nao do</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 mt-3 mt-sm-0"><i class="mdi mdi-email mr-1"></i> luongvanquyen@gmail.com</p>
                        <p class="mb-0"><i class="mdi mdi-phone-classic mr-1"></i> 828-216-2190</p>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-center mt-3 mt-sm-0">
                            <div class="badge font-14 bg-soft-info text-info p-1">150 equipment</div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-sm-right">
                            <a href="javascript:void(0);" class="action-icon"> <i
                                    class="mdi mdi-square-edit-outline"></i></a>
                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box-->
            @foreach ($zones as $zone)
            <div class="card-box mb-2">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="d-flex align-self-center mr-3 rounded-circle"
                                src="{{url('https://previews.123rf.com/images/veremeev/veremeev1604/veremeev160400081/57030084-field-of-spring-tulips-flowers-is-a-lot-of-bright-mature-flowers-flower-bed-bright-flower-scorching-.jpg')}}"
                                alt="Generic placeholder image" height="64">
                            <div class="media-body">
                                <h4 class="mt-0 mb-2 font-16">{{ $zone->name }}</h4>
                                <p class="mb-1"><b>Location:</b> dau do o ha noi</p>
                                <p class="mb-0"><b>Description:</b>{{ $zone->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 mt-3 mt-sm-0"><i class="mdi mdi-email mr-1"></i>{{ $user->email }}</p>
                        <p class="mb-0"><i class="mdi mdi-phone-classic mr-1"></i> 828-216-2190</p>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-center mt-3 mt-sm-0">
                            <div class="badge font-14 bg-soft-info text-info p-1">{{ $zone->equipment->count() }} equipment</div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-sm-right">
                            <a href="javascript:void(0);" class="action-icon"> <i
                                    class="mdi mdi-square-edit-outline"></i></a>
                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box-->
            @endforeach
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->

<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Add New Zone</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="/zone">
                    @csrf
                    <div class="form-group">
                        <label for="name">Zone Name</label>
                        <input autocomplete="off" type="text" class="form-control" id="name" name="name" placeholder="Enter company name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description"
                            placeholder="Please enter comment"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
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
@endsection

@section('script')
<!-- Plugins js-->
<script src="{{asset('assets/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/crm-opportunities.init.js')}}"></script>
@endsection