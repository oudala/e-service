@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile</span>
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
				<div class="row row-sm">
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
                                @php
                                    $image_path = 'Attachments/' . $user->LastName . '/'. $user->CNI . '.jpg';
                                    $image_url = asset($image_path);
                                    $file_exists = file_exists(public_path($image_path));
                                    if(!$file_exists){
                                        $image_path = str_replace('.jpg', '.png', $image_path);
                                        $image_url = asset($image_path);
                                        $file_exists = file_exists(public_path($image_path));
                                    }
                                @endphp
										<div class="main-img-user profile-user">
                                        
											<img alt="" src="{{URL::asset($image_path)}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div>
												<h5 class="main-profile-name">{{$user->FirstName}} {{$user->LastName }}</h5>
												<p class="main-profile-name-text">{{$user->email}}</p>
											</div>
										</div>
										<h6>Grade</h6>
										<div class="main-profile-bio">
											@switch($user->Rolee)
												@case(1)
													Administrateur
													@break
												@case(2)
													Chef de Département
													<br>
													<a href="/Prof">More</a>
													@break
												@case(3)
													Coordinateur
													<br>
													<a href="/Prof">More</a>
													@break
												@case(4)
													Professeur
													<br>
													<a href="/Prof">More</a>
													@break
												@case(5)
													Etudiant
													<br>
													<a href="/Prof">More</a>
													@break
											@endswitch
											<br>
										</div><!-- main-profile-bio -->
										<div class="row">
											<div class="col-md-4 col mb20">
												<h5>947</h5>
												<h6 class="text-small text-muted mb-0">Followers</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>583</h5>
												<h6 class="text-small text-muted mb-0">Tweets</h6>
											</div>
											<div class="col-md-4 col mb20">
												<h5>48</h5>
												<h6 class="text-small text-muted mb-0">Posts</h6>
											</div>
										</div>
										<hr class="mg-y-30">
										<label class="main-content-label tx-13 mg-b-20">Social</label>
										<div class="main-profile-social-list">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>Github</span> <a href="">github.com/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>Twitter</span> <a href="">twitter.com/spruko.me</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-info-transparent text-info">
													<i class="icon ion-logo-linkedin"></i>
												</div>
												<div class="media-body">
													<span>Linkedin</span> <a href="">linkedin.com/in/spruko</a>
												</div>
											</div>
											<div class="media">
												<div class="media-icon bg-danger-transparent text-danger">
													<i class="icon ion-md-link"></i>
												</div>
												<div class="media-body">
													<span>My Portfolio</span> <a href="">spruko.com/</a>
												</div>
											</div>
										</div>
										<hr class="mg-y-30">
                                        @if(Auth::user()->Rolee == 5 and $user->AnneeScolaire != null)
                                            <h6>study period</h6>
                                            <div class="skill-bar mb-4 clearfix mt-3">
                                                <span>school year</span>
                                                @php
                                                    $AnneeScolaire = $user->AnneeScolaire;
                                                    $AnneeScolaire = $AnneeScolaire * 20;
                                                @endphp
                                                <div class="progress mt-2">
                                                    <div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: {{$AnneeScolaire}}%"></div>
                                                </div>
                                            </div>
                                        @endif

										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="row row-sm">
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-primary-transparent">
												<i class="icon-layers text-primary"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">Orders</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-danger-transparent">
												<i class="icon-paypal text-danger"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">Revenue</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="counter-status d-flex md-mb-0">
											<div class="counter-icon bg-success-transparent">
												<i class="icon-rocket text-success"></i>
											</div>
											<div class="mr-auto">
												<h5 class="tx-13">Product sold</h5>
												<h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
												<p class="text-muted mb-0 tx-11"><i class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav nav-tabs profile navtab-custom panel-tabs">
										<li class="active">
											<a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ABOUT ME</span> </a>
										</li>
										@if(Auth::user()->Rolee == 4 || Auth::user()->Rolee == 3 || Auth::user()->Rolee == 2 || Auth::user()->Rolee == 1)
											<li class="">
												<a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs">Statut Note</span> </a>
											</li>
										@endif

										<li class="">
											<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="las la-cog tx-16 mr-1"></i></span> <span class="hidden-xs">SETTINGS</span> </a>
										</li>
									</ul>
								</div>
								<div class="tab-content border-left border-bottom border-right border-top-0 p-4">
									<div class="tab-pane active" id="home">
										<h4 class="tx-15 text-uppercase mb-3">BIOdata</h4>
										<p class="m-b-5">Hi I'm Petey Cruiser,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
										<div class="m-t-30">
											<h4 class="tx-15 text-uppercase mt-3">Experience</h4>
											<div class=" p-t-10">
												<h5 class="text-primary m-b-5 tx-14">Lead designer / Developer</h5>
												<p class="">websitename.com</p>
												<p><b>2010-2015</b></p>
												<p class="text-muted tx-13 m-b-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
											</div>
											<hr>
											<div class="">
												<h5 class="text-primary m-b-5 tx-14">Senior Graphic Designer</h5>
												<p class="">coderthemes.com</p>
												<p><b>2007-2009</b></p>
												<p class="text-muted tx-13 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="profile">
										<div class="tab-pane" id="tab5">
											<div class="table-responsive mt-15">
												<table class="table center-aligned-table mb-0 table-hover"
													style="text-align:center">
													<thead>
														<tr class="text-dark">
															<th>#</th>
															<th>FirstName</th>
															<th>LastName</th>
															<th>Statut Note</th>
															<th>created_at</th>
															<th>created_by </th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 0; ?>
														@foreach ($Details as $x)
															<?php $i++; ?>
															<tr>
																<td>{{ $i }}</td>
																<td>{{ $x->FirstName }}</td>
																<td>{{ $x->LastName }}</td>
																@if ($x->StatutNote == 'Added')
																	<td><span
																			class="badge badge-pill badge-success"> not add </span>
																	</td>
																@elseif($x->StatutNote =='Added')
																	<td><span
																			class="badge badge-pill badge-danger"> Added </span>
																	</td>
																@else
																	<td><span
																			class="badge badge-pill badge-warning"> In process </span>
																	</td>
																@endif
																<td>{{ $x->created_at }}</td>
																<td>{{ $x->created_by }}</td>
															</tr>
														@endforeach
													</tbody>
												</table>
	
	
											</div>
										</div>
									</div>
									<div class="tab-pane" id="settings">
										<form role="form">
											<div class="form-group">
												<label for="FullName">Full Name</label>
												<input type="text" value="John Doe" id="FullName" class="form-control">
											</div>
											<div class="form-group">
												<label for="Email">Email</label>
												<input type="email" value="first.last@example.com" id="Email" class="form-control">
											</div>
											<div class="form-group">
												<label for="Username">Username</label>
												<input type="text" value="john" id="Username" class="form-control">
											</div>
											<div class="form-group">
												<label for="Password">Password</label>
												<input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
											</div>
											<div class="form-group">
												<label for="RePassword">Re-Password</label>
												<input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
											</div>
											<div class="form-group">
												<label for="AboutMe">About Me</label>
												<textarea id="AboutMe" class="form-control">Loren gypsum dolor sit mate, consecrate disciplining lit, tied diam nonunion nib modernism tincidunt it Loretta dolor manga Amalia erst volute. Ur wise denim ad minim venial, quid nostrum exercise ration perambulator suspicious cortisol nil it applique ex ea commodore consequent.</textarea>
											</div>
											<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
										</form>
									</div>
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
@endsection