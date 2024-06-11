@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">MaClass</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Fillier</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
				
					@if(!empty($MaClass))
						@foreach ($MaClass as $item)
						<div class="col-lg-4 col-md-4">
							<div class="card mg-b-20 text-center">
								<div class="card-body">
									<img src="{{URL::asset('assets/img/svgicons/note_taking.svg')}}" alt="" class="wd-35p">
									<h5 class="mg-b-10 mg-t-15 tx-24 text-primary">-> {{$item->name}}
										@if($item->level == 1)
											Premier année
										@elseif($item->level == 2)
											Deuxième année
										@else
											Troisième année
										@endif
										<-</h5>
										<form action="{{ route('Class.showModuls')}}" method="POST">
											{{ csrf_field() }}
										<BUtton  class="text btn btn-m btn-primary" type="submit" name="filiere" value="{{$item->id}}">Check The Settings</BUtton> 
									</form>
									
								</div>
							</div>
						</div>
					@endforeach
					@endif
            
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection