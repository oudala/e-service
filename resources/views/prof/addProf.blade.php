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
add teachers
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">teachers</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/add teacher</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
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
                    <form action="{{ route('Prof.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">FIrst Name</label>
                                <input type="text" class="form-control" id="inputName" name="teacher_FirstName"
                                    title="Enter your Teacher name" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="inputName" name="teacher_LastName"
                                    title="Enter your Teacher name" required>
                            </div>
                            <div class="col">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com" required>
                            </div>
                        </div>
                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label>Join Date</label>
                                <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" required value="{{ old('Due_date') ?? Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="col">
                                <label>CNI</label>
                                <input type="text" class="form-control" name="cni" placeholder="xx-xxxxxx" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Phone</label>
                                <input type="number" class="form-control" id="inputName" name="phone"
                                    title="Enter your Teacher phone number" required>
                            </div>
                        </div><br>

                        <p class="text-danger">* Format du fichier PDF, jpeg, .jpg, png</p>
                        <h5 class="card-title">Profile picture</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div><br>

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