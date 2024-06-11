@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
edit Student
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Student</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/edit</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ url('Student/update') }}" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                                <div class="col">
                                    <label for="inputName" class="control-label">FIrst Name</label>
                                    <input type="hidden" name="etu_id" value="{{ $user->id }}">
                                    <input type="text" class="form-control" id="inputName" name="etu_FirstName"
                                        title="Enter your Teacher First name" value="{{ $user->FirstName }}" >
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" id="inputName" name="etu_LastName"
                                        title="Enter your Teacher Last name" value="{{ $user->LastName }}" >
                                </div>

                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email@example.com" value="{{ $user->email }}" >
                                </div>
                            </div>
                            <br>
                            {{-- 2 --}}
                            <div class="row">
                                <div class="col">
                                    <label>Join Date</label>
                                    <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                        type="text"  value="{{ old('Due_date') ?? Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">CNI</label>
                                    <input type="text" class="form-control" id="inputName" name="cni"
                                        title="Enter CNI" value="{{ $user->CNI }}" >
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">Phone</label>
                                    <input type="number" class="form-control" id="inputName" name="phone"
                                        title="Enter your Teacher phone number" value="{{ $user->phone_number }}" >
                                </div>
                            </div>
                            <br>
                            {{-- 2 --}}
                            <div class="row">
                                <div class="col">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">filieres</label>
                                        <select name="filiere_id" id="filiere_id" class="form-control" required>
                                            <option value="" selected disabled></option>
                                            @foreach ($filieres as $x)
                                                <option value="{{ $x->id }}" {{ $user->filier->name == $x->name ? 'selected' : '' }}>{{ $x->name }} {{$x->level}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col">

                                        <label>New Password</label>
                                        <input type="text" class="form-control" name="password" >
                                </div>
                                <div class="col">
                                    <label for="inputName" class="control-label">CNE</label>
                                    <input type="text" class="form-control" id="CNE" name="CNE"
                                        title="Enter your CNE number"  value="{{ $user->CNE }}" >
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>


@endsection