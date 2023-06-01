@extends('layouts.app', ['title' => 'Update Company Slider '])

@section('content')

							<div class="card" style="100%">
								<!--begin::Card body-->
								<div class="card-body" >
									<!--begin::Stepper-->
									<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper" >
                                       
										<!--begin::Nav-->
										<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper" >
                                            <div class="stepper-nav mb-5" style="width:100%;">
		
                                                <div class="stepper-item " data-kt-stepper-element="nav">
                                                <a href="{{route('manage_web')}}"><h3 class="stepper-title">Top Products</h3></a>
                                                </div>
                                                <!--end::Step 2-->
                                                <!--begin::Step 3-->
                                                <div class="stepper-item " data-kt-stepper-element="nav">
                                                    <a href="{{route("featured_product")}}"><h3 class="stepper-title">Featured Product</h3></a>
                                                </div>
                                    
                                    
                                                <div class="stepper-item " data-kt-stepper-element="nav">
                                                    <a href="{{route("web_content")}}"><h3 class="stepper-title">Web Content </h3></a>
                                                </div>
                                    
                                    
                                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                                    <a href="{{ route('slider') }}"><h3 class="stepper-title">Slider</h3></a>
                                                </div>

                                                <div class="stepper-item" data-kt-stepper-element="nav">
                                                    <a href="{{ route('website') }} "><h3 class="stepper-title">Website</h3></a>
                                                </div>

                                            </div>
                                        </div>
										<!--end::Nav-->
										<!--begin::Form-->
										<div class="mx-auto pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form" style="width:100%;">
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												<!--begin::Wrapper-->
                                               

												<div class="w-100">
													<!--begin::Heading-->
													<div class="pb-10 pb-lg-15">
														<!--begin::Title-->
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Slider</h2>

                                                    </div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="fv-row">
														
                                                        <!-- display msg if there is any -->
                                                        @if(Session::has('message'))
                                                        <div class="col-lg-16" style="text-align:center; flex:1">
																
																<input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
																	
																	<!--begin::Info-->
																	<span class="d-block fw-bold text-start">
                                                                  
    	                                                             <span class="text-muted fw-bold fs-3 badge badge-light-info" ><p  style = "color:red; text-align:center; align-items: center;display:flex; flex:1;"> {{Session('message')}}</p> </span>

                                                                     
																		
																	</span>
																	<!--end::Info-->
																</label>
																<!--end::Option-->
																<!-- endloop here -->
															</div>
                                                            @endif

                                                        <!-- end msg -->
                                                        
                                                       <div class="col-md-12">
                                                            <div class="col-md-6" style="float: left">
                                                                <form action="{{ route('update_slider') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <!--begin::Card-->
                                                                    <div class="card">
                                                                        <!--begin::Body-->
                                                                        <div class="card-body">
                                                                           <h4>Update Company Slider</h4>
                                                                            <!--begin::Border-->
                                                                            <div class="separator separator-dashed my-8"></div>
            <!--                                                                
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Warehouse Code</label>
                                                                                <input type="text" class="form-control form-control form-control-solid" name="code" />
                                                                            </div> -->
            
                                                                            
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 1</label>
                                                                                <input type="file" class="form-control form-control form-control-solid" name="img" required>
                                                                            </div>
            
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 2</label>
                                                                                <input type="file"  class="form-control form-control form-control-solid" name="img_2" required>
                                                                            </div>
            
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 3</label>
                                                                                <input type="file" class="form-control form-control form-control-solid" name="img_3" required>
                                                                            </div>
            
                                                                            <div class="mb-5">
                                                                                <input type="submit" value="Update" class="btn btn-primary">
                                                                            </div>
                                                                            <!--end::Action-->
                                                                        </div>
                                                                        <!--end::Body-->
                                                                    </div>
                                                                    <!--end::Card-->
                                                                </form>
                                                            </div>


                                                            <div class="col-md-6" style="float: right">
                                                                @php
                                                                    $slider = DB::table('slider')
                                                                    ->first();

                                                                @endphp

                                                                @if($slider)
                                                               
                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="/public/uploads/slider/{{$slider->img}}" alt="Slider 1">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="/public/uploads/slider/{{$slider->img_2}}" alt="Slider 2">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="/public/uploads/slider/{{$slider->img_2}}" alt="Slider 3">
                                                                </div>

                                                                @endif
                                                            </div>
                                                       </div>
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Wrapper-->
											</div>
											
									</div>
									<!--end::Stepper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
					
    
@endsection