@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">	
							<h4 class="content-title mb-0 my-auto">MaClass</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$fillier->name}}</span>
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
					@foreach($MaClass as $item)
							<div class="col-sm-12 col-lg-6 col-xl-3">
								<div class="card card-img-holder">
									<a href="{{route('Class.show', $item->id)}}">
										<div class="card-body list-icons">
											<div class="clearfix">
												<div class="float-left  mt-2">
													<span class="text-primary ">
														<i class="si si-credit-card tx-30"></i>
													</span>
												</div>
												<div class="float-right" >
													<h5><p class="card-text text mb-1 text-capitalize ">{{ $item->semestre == 1 ? 'Premier semester' : 'Second semester' }}</p></h5>
													<h3 class="mb-1 font-light text-primary">{{$item->name}}</h3>
												</div>
											</div>
											<div class="card-footer p-0">
												<p class="text-muted mb-0 pt-4"><i class="si si-arrow-left-circle text-success mr-2"></i>{{$item->description}}</p>
											</div>
										</div>
									</a>
								</div>
							</div>
					@endforeach
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection