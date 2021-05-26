@extends('layouts.vertical', ['title' => 'Edit Equipment'])

@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/libs/clockpicker/clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('assets/libs/mohithg-switchery/mohithg-switchery.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/multiselect/multiselect.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet"
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Equipment</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
                <h4 class="page-title">Settings {{ $equipment->name }}</h4>
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
        <div class="col-lg-6">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">GENERAL</h5>
                <form method="post" action="/equipment/{{$equipment->slug}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="product-name">Equipment Name <span class="text-danger">*</span></label>
                        <input autocomplete="off" type="text" id="product-name" name="name" class="form-control" placeholder=""
                            value="{{ $equipment->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Equipment Description</label>
                        <textarea name="description" class="form-control" rows="3"
                            placeholder="Please enter comment">{{ $equipment->description }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input autocomplete="off" type="file" class="custom-file-input" id="inputGroupFile04" name="image">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="example-select">Zone</label>
                        <select class="form-control" id="example-select" name="zone_id">
                            @foreach ($zones as $zone)
                            @if ($equipment->zone_id == $zone->id)
                            <option checked value={{ $zone->id }}>{{ $zone->name }}</option>
                            @endif
                            <option value={{ $zone->id }}>{{ $zone->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="text-right">
                        <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </form>

            </div> <!-- end card-box -->
        </div> <!-- end col -->

        <div class="col-lg-6">

            <div class="card-box">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">SETTING</h5>

                <form method="post" action="/setting/{{$equipment->slug}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Set Watering Timer</label>
                        <div class="input-group clockpicker" data-placement="top" data-align="top"
                            data-autoclose="true">
                            <input autocomplete="off" type="text" name="watering_time" class="form-control" value="{{ $setting ? \Carbon\Carbon::parse($setting->watering_time)->format('H:i') : '' }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="example-number">Amount of water</label>
                        <input autocomplete="off" class="form-control" id="example-number" type="number" name="amount_of_water"
                            value="{{ $setting->amount_of_water ?? '' }}">
                    </div>

                    <div class="form-group mb-0">
                        <label for="example-range">Lowest Humidity Level</label>
                        <input autocomplete="off" class="custom-range" id="example-range" type="range" name="humidity" min="0" max="100" value="{{ $setting->humidity ?? '' }}" oninput="this.nextElementSibling.value = this.value">
                        <output id="range" name="range" for="example-range">{{ $setting->humidity ?? '' }}</output>%
                    </div>

                    <div class="text-right">
                        <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div> <!-- end col-->

            <div class="card-box">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">ACTION</h5>
                <form method="post" action="/history/{{$equipment->slug}}">
                    @csrf
                    <div class="switchery-demo">
                        <input autocomplete="off" type="checkbox" @if ($equipment->status) checked @endif
                        data-plugin="switchery" data-color="#64b0f2" data-size="large" name="status" />
                    </div>
                    <div class="text-right">
                        <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div> <!-- end card-box -->

        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection

@section('script')
<!-- Plugins js-->

<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/libs/clockpicker/clockpicker.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/summernote/summernote.min.js')}}"></script>
<script src="{{asset('assets/libs/selectize/selectize.min.js')}}"></script>
<script src="{{asset('assets/libs/mohithg-switchery/mohithg-switchery.min.js')}}"></script>
<script src="{{asset('assets/libs/multiselect/multiselect.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('assets/libs/devbridge-autocomplete/devbridge-autocomplete.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-mockjax/jquery-mockjax.min.js')}}"></script>
<!-- Page js-->
<script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
<script src="{{asset('assets/js/pages/add-product.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-pickers.init.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
@endsection