@extends('layouts.app', ['title' => 'Manage Website'])

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
                                    
                                    
                                                <div class="stepper-item" data-kt-stepper-element="nav">
                                                    <a href="{{ route('slider') }}"><h3 class="stepper-title">Slider</h3></a>
                                                </div>

                                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                                    <a href="{{ route('website') }} "><h3 class="stepper-title">Website</h3></a>
                                                </div>

                                            </div>
                                        </div>
										<!--end::Nav-->
										<!--begin::Form-->
										<div class="mx-auto pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form" style="width:100%;">
											
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

                                                        
                                                        <div class="col-md-8">
                                                            <div class="mb-5">
                                                                <label class="fs-6 form-label fw-bolder text-dark">About Us</label>
                                                               
                                                                <div id="editor_1" name="about" >
                                                                    <p>{!!$website->about!!}</p>
                                                                    
                                                                  </div>
                                                            </div>
    
                                                            <div class="mb-5">
                                                                <label class="fs-6 form-label fw-bolder text-dark">Terms and Conditions</label>
                                                                
                                                                <div id="editor_2" name="terms" >
                                                                    <p>{!!$website->terms!!}</p>
                                                                    
                                                                  </div>
                                                            </div>
    
                                                            <div class="mb-5">
                                                                <label class="fs-6  form-label fw-bolder text-dark">Privacy Policy</label>
                                                               
                                                                <div id="editor" name="policy">
                                                                    <p>{!!$website->policy!!}</p>
                                                                  </div>

                                                                  
                                                                  
                                                            </div>
    
                                                            <div class="mb-5">
                                        
                                                                <input onclick="UpdatePolicy()" type="button" value="Update" class="btn btn-primary">
                                                            </div>
                                                            <!--end::Action-->
                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                           
                                        </div>
                                        <!--end::Input group-->       

												
										</div>	
									</div>
									<!--end::Stepper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
					
    
@endsection