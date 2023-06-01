@extends('layouts.app', ['title' => 'Edit Top Product '])

@section('content')

							<div class="card" style="100%">
								<!--begin::Card body-->
								<div class="card-body" >
									<!--begin::Stepper-->
									<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper" >
                                       
										<!--begin::Nav-->
										
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
                                                        <div style="display: flex; flex:1; justify-content:space-between" >
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Manage Top Products</h2>
                                                        <a href="{{ route('manage_web') }}" class="btn btn-primary btn-sm">Back</a>
                                                        </div>

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
                                                        
                                                        <form action="{{ route('update_top_product') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <!--begin::Card-->
                                                            <div class="card">
                                                                <!--begin::Body-->
                                                                <div class="card-body">
                                                                   <h4>Update Top Product</h4>
                                                                    <!--begin::Border-->
                                                                    <div class="separator separator-dashed my-8"></div>
    <!--                                                                
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Warehouse Code</label>
                                                                        <input type="text" class="form-control form-control form-control-solid" name="code" />
                                                                    </div> -->
    
                                                                    
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Product</label>
                                                                        <input  class="form-control form-control form-control-solid" name="product" >
                                                                          
                                                                    </div>
    
                                                                    @error('product')
                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                    </div>
                                                                    @enderror
    
                                                                    <div class="mb-5">
                                                                        <input type="hidden" value='{{ $id }}' name="id">
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