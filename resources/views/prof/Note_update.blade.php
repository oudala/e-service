@extends('layouts.master')
@section('css')
@endsection
@section('title')
change statut 
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Teacher</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    change statut</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">   
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('Status_update') }}/{{ $user->id }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">First Name</label>
                                <input type="hidden" name="teacher_id" value="{{ $user->id }}">
                                <input type="text" class="form-control" id="inputName" name="FirstName" value="{{ $user->FirstName }}" required
                                    readonly>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="inputName" name="teacher_LastName" value="{{ $user->LastName }}" required readonly>
                            </div>

                            <div class="col">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com" value="{{ $user->email }}" required readonly >
                            </div>

                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label>departement</label>
                                <input class="form-control" name="Due_date" 
                                    placeholder="{{ $user->departement ? $user->departement->name : 'N/A' }}" 
                                    type="text" required 
                                    value="{{ $user->departement ? $user->departement->name : 'N/A'}}" readonly>
                            </div>
                            
                            <div class="col">
                                <label for="inputName" class="control-label">CNI</label>
                                <input type="text" class="form-control" id="inputName" name="cni"
                                value="{{ $user->CNI }}" required readonly>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">Phone</label>
                                <input type="number" class="form-control" id="inputName" name="phone"
                                value="{{ $user->phone_number }}" required readonly>
                            </div>
                        </div>

                        {{-- 4 --}}
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Note Statut</label>
                                <select class="form-control" id="Status" name="Status" required>
                                    <option selected="true" disabled="disabled">-- Note Statut --</option>
                                    <option value="Added">Added</option>
                                    <option value="In process">In process</option>
                                </select>
                            </div>

                            <div class="col">
                                <label>Changement Date</label>
                                <input class="form-control fc-datepicker" name="Payment_Date" placeholder="YYYY-MM-DD"
                                    type="text" required>
                            </div>
                        </div><br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>

                    </form>
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