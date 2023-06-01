@extends('layouts.app', ['title' => 'Web Content '])

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
                                    
                                    
                                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                                    <a href="{{route("web_content")}}"><h3 class="stepper-title">Web Content </h3></a>
                                                </div>
                                    
                                    
                                                <div class="stepper-item" data-kt-stepper-element="nav">
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
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Web content</h2>

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
                                                        
                                                        <form action="{{ route('update_web_content') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <!--begin::Card-->
                                                            <div class="card">
                                                                <!--begin::Body-->
                                                                <div class="card-body">
                                                                   <h4>Update Company Info</h4>
                                                                    <!--begin::Border-->
                                                                    <div class="separator separator-dashed my-8"></div>
    <!--                                                                
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Warehouse Code</label>
                                                                        <input type="text" class="form-control form-control form-control-solid" name="code" />
                                                                    </div> -->
    
                                                                    
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Company Name</label>
                                                                        <input type="text" value="{{$company->company_name}}" class="form-control form-control form-control-solid" name="company_name">
                                                                    </div>

                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Address 1</label>
                                                                        <textarea class="form-control form-control form-control-solid" name="address_1">{{$company->address_1}}</textarea>
                                                                    </div>

                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Address 2</label>
                                                                        <textarea class="form-control form-control form-control-solid" name="address_2">{{$company->address_2}}</textarea>
                                                                    </div>

                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Address 3</label>
                                                                        <textarea class="form-control form-control form-control-solid" name="address_3">{{$company->address_3}}</textarea>
                                                                    </div>

                                                                    
    
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Company Email</label>
                                                                        <input type="text" value="{{$company->company_email}}" class="form-control form-control form-control-solid" name="company_email">
                                                                    </div>
    
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Company Phone</label>
                                                                        <input type="text" value="{{$company->company_phone}}" class="form-control form-control form-control-solid" name="company_phone">
                                                                    </div>
    
                                                                    <div class="mb-5">
                                                                        <input type="hidden" value='{{ $company->id }}' name="id">
                                                                        <input type="submit" value="Update" class="btn btn-primary">
                                                                    </div>
                                                                    <!--end::Action-->
                                                                </div>
                                                                <!--end::Body-->
                                                            </div>
                                                            <!--end::Card-->
                                                        </form>
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