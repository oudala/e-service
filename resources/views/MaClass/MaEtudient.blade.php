@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advanced ui</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Userlist</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Student Table </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								</div>
							<div class="card-body">
								<div class="table-responsive border-top userlist-table">
									<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
										<thead>
											<tr class="text-center">
												<th class="wd-lg-8p"><span>User</span></th>
												<th class="wd-lg-15p text-left "><span>First Name</span></th>
												<th class="wd-lg-15p text-left"><span>Last Name</span></th>
												<th class="wd-lg-15p "><span>CNE</span></th>
												<th class="wd-lg-15p"><span>Email</span></th>
												<th class="wd-lg-20p"><span>Exam</span></th>
												<th class="wd-lg-15p text-center"><span>Status</span></th>
											</tr>
										</thead>
										<form action="{{ route('Note.create') }}" method="get" id="noteForm">
										<tbody>
											
											@foreach ($usersWithNotes as $item)
												@php
													$image_path = 'Attachments/' . $item->LastName . '/'. $item->CNI . '.jpg';
													$image_url = asset($image_path);
													$file_exists = file_exists(public_path($image_path));
													if(!$file_exists){
														$image_path = str_replace('.jpg', '.png', $image_path);
														$image_url = asset($image_path);
														$file_exists = file_exists(public_path($image_path));
													}
												@endphp
												<tr>
													<td>
														<img alt="avatar" class="rounded-circle avatar-lg mr-2" src="{{URL::asset($image_path)}}" style="transition: all .3s ease; transform: scale(1) translateX(-50%);" onmouseover="this.style.transform='scale(3) translateX(-40%)'" onmouseout="this.style.transform='scale(1) translateX(-40%)'">
													<td class="text-left">{{ $item->FirstName }}</td>
													<td class="text-left"><a
														href="{{ url('profile') }}/{{ $item->id }}">{{ $item->LastName }}</a>
													</td>
													<td class="text-center">{{ $item->CNE }}</td>
													<td>	
														<a href="#">{{ $item->email }}</a>
													</td>
													<td>
														<input type="hidden" name="id_student[]" value="{{ $item->id }}">
														<input type="hidden" name="id_Filier[]" value="{{ $fillier->id }}">
														<input type="hidden" name="id_module[]" value="{{ $Module->id }}">
														<input type="hidden" name="id_Note[]" value="{{ $item->notes_id}}">
													@if($item->submitProf == 0 )
														<input type="number" class="form-control form-control-lg rounded-20" name="Exam[]" id="NoteExam-{{ $loop->index }}" value="{{ $item->Note }}" >
													@elseif($item->submitProf == 1 && Auth::user()->Rolee !== 4)
														<input type="number" class="form-control form-control-lg rounded-20" name="Exam[]" id="NoteExam-{{ $loop->index }}" value="{{ $item->Note }}" readonly>
														@elseif($item->submitProf == 1 && Auth::user()->Rolee ===4)		
														<input type="number" class="form-control form-control-lg rounded-20" name="Exam[]" id="NoteExam-{{ $loop->index }}" value="{{  $item->Note }}" >													
													@endif

													</td>
													<td class="text-left">
														<span class="text-center" id="status1-{{ $loop->index }}"></span>
													</td>
												</tr>
											@endforeach

										</tbody>
									</table>
									<div class="d-flex justify-content-center mt-2">
										@if(Auth::user()->Rolee !== '4')
											<button type="submit" class="btn btn-primary waves-effect waves-light w-md mt-2 ml-2" name="submit-prof"  id ="suifbmit-prof" value ="1">Submit</button>
										@endif
										@if(Auth::user()->Rolee == '4')
										<button class="btn btn-primary waves-effect waves-light w-md mt-2 ml-2" name="submit-coordinateur" type="submit" value ="1">Submit-coor</button>
										@endif
										@php 
											$bool=0;
										@endphp
										@foreach ($usersWithNotes as $item)
											@if($item->submitProf == 1 || $item->submitCoordinateur == 1)
												@php
												$bool = 1;
												break;
												@endphp
											@endif

										@endforeach
										@if($bool == 0)
											<button class=" btn btn-primary waves-effect waves-light w-md mt-2 ml-2" name="sauvgard" type="submit" value ="1">sauvgard</button>
										@endif
									</div>
								</form>

								</div>
								<ul class="pagination mt-4 mb-0 float-left">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">4</a></li>
									<li class="page-item"><a class="page-link" href="#">5</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>	
								

							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Datepicker js -->
<script>

document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tbody tr');

    function checkInputs() {
        const allInputsFilled = Array.from(rows).every(row => {
            const examInput = row.querySelector('[name="Exam[]"]');
            return examInput.value.trim() !== '';
        });

        const submitButton = document.querySelector('button[name="submit-prof"]');
        
        if (allInputsFilled) {
            submitButton.style.display = 'block';
        } else {
            submitButton.style.display = 'none';
        }
    }

    rows.forEach((row, index) => {
        const examInput = row.querySelector(`#NoteExam-${index}`);
        const statusSpan1 = row.querySelector(`#status1-${index}`);

        function updateStatus() {
            if (examInput.value.trim() !== '') {
                statusSpan1.classList.add('text-success');
                statusSpan1.classList.remove('text-danger');
                statusSpan1.textContent = 'Good';
            } else {
                statusSpan1.classList.add('text-danger');
                statusSpan1.classList.remove('text-success');
                statusSpan1.textContent = 'not added yet';
            }

            checkInputs(); // Call the function to check all inputs
        }

        examInput.addEventListener('input', updateStatus);

        updateStatus(); // Initial check
    });
});
</script>
@endsection