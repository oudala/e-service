
@extends('layouts.master')
@section('title')
teachers
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">prof</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/list of prof </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('delete_prof'))
        <script>
            window.onload = function() {
                notif({
                    msg: "delete Student successfully",
                    type: "success"
                })
            }

        </script>
    @endif


    @if (session()->has('Status_Update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "update Student successfully",
                    type: "success"
                })
            }

        </script>
    @endif

    @if (session()->has('restore_prof'))
        <script>
            window.onload = function() {
                notif({
                    msg: "restore Student  successfully",
                    type: "success"
                })
            }

        </script>
    @endif

    <!-- row -->        
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                        <a href="Student/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; add prof</a>

                        <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export/prof') }}"
                            style="color:white"><i class="fas fa-file-download"></i>&nbsp; EXCEL </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Fisrt name </th>
                                    <th class="border-bottom-0">Last name </th>
                                    <th class="border-bottom-0">Filieres</th>
                                    <th class="border-bottom-0"> Email</th>
                                    <th class="border-bottom-0">departement</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($Student as $stu)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $stu->FirstName }} </td>
                                        <td><a
                                            href="{{ url('profile') }}/{{ $stu->id }}">{{ $stu->LastName }}</a>
                                        </td>
                                        <td>{{ $stu->filier ?$stu->filier->name  : 'N/A' }}</td>
                                        <td>{{ $stu->email}}</td>
                                        <td>{{ $stu->departement ? $stu->departement->name : 'N/A' }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Action<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                        <a class="dropdown-item"
                                                            href=" {{ url('edit_stu') }}/{{ $stu->id }}">Edit Student</a>


                                                        <a class="dropdown-item" href="#" data-prof_id="{{ $stu->id }}"
                                                            data-toggle="modal" data-target="#delete_prof"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp; Delete</a>

                                                        <a class="dropdown-item" href="#" data-prof_id="{{ $stu->id }}"
                                                            data-toggle="modal" data-target="#Transfer_prof"><i
                                                                class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp; arachive</a>

                                                        <a class="dropdown-item" href="Print_prof/{{ $stu->id }}"><i
                                                                class="text-success fas fa-print"></i>&nbsp;&nbsp; Print</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    <!-- حذف الفاتورة -->
    <div class="modal fade" id="delete_prof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('Student.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    are you sure !!
                    <input type="text" name="prof_id" id="prof_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-danger">submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ارشيف الفاتورة -->
    <div class="modal fade" id="Transfer_prof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archive</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('Student.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    are you sure !!
                    <input type="hidden" name="prof_id" id="prof_id" value="">
                    <input type="hidden" name="id_page" id="id_page" value="2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
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
  <!-- Internal Data tables -->
  <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
  <!--Internal  Datatable js -->
  <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
  <!--Internal  Notify js -->
  <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

  <script>
      $('#delete_prof').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var prof_id = button.data('prof_id')
          var modal = $(this)
          modal.find('.modal-body #prof_id').val(prof_id);
      })

  </script>

  <script>
      $('#Transfer_prof').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var prof_id = button.data('prof_id')
          var modal = $(this)
          modal.find('.modal-body #prof_id').val(prof_id);
      })

  </script>







@endsection



