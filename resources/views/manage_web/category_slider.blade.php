@extends('layouts.app', ['title' => 'Edit Featured Product '])

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
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Manage Category Slider</h2>
                                                        <a href="/manage-web" class="btn btn-primary btn-sm">Back</a>
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
                                                        
                                                        <form action="{{ route('update_category_slider') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                          
                                                            <!--begin::Card-->
                                                            <div class="card">
                                                                <!--begin::Body-->
                                                                <div class="card-body">
                                                                  
                                                                    <div class="separator separator-dashed my-8"></div>

                                                                    <div class="mb-5">
                                                                        <label class="fs-6 form-label fw-bolder text-dark">Category</label>
                                                                        <select class="form-control form-control form-control-solid" name="category" >
                                                                            <option></option>
                                                                           @php
                                                                               $cats = DB::table('sub_cat')
                                                                               ->where('status', '1')
                                                                               ->get();
                                                                           @endphp
                                                                           @foreach($cats as  $cat)
                                                                                <option value="{{$cat->sub_cat_id}}">{{$cat->sub_title }}</option>
                                                                           @endforeach
                                                                        </select>
                                                                    </div>
    
                                                                    <div class="row" >
                                                                        <div class="w-100">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-10">
                                                                                <!--begin::Label-->
                                                                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                                                    <span class="required">Image </span>
                                                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="file" class="form-control form-control-lg form-control-solid" name="image" required/>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-5">
                                                                        
                                                                        <input type="submit" value="Save" class="btn btn-primary">
                                                                    </div>
                                                                    <!--end::Action-->
                                                                </div>

                                                                <table width="100%" style="margin:30px">
                                                                    
                                                                    <tr>
                                                                        <td width="10%">SN</td>
                                                                        <td width="30%">Image</td>
                                                                        <td width="60px">Title</td>
                                                                       
                                                                    </tr>
                                                                    
                                                                    @foreach($cats as  $cat)
                                                                    <tr>
                                                                        <td width="10%">{{ $loop->iteration }}</td>
                                                                        <td width="30%"><img style="width:80%" src="https://stockmgt.gapaautoparts.com/public/uploads/category_slider/{{$cat->slider}}" alt=""></td>
                                                                        <td width="60%">{{$cat->sub_title}}</td>
                                                                       
                                                                    </tr>
                                                                   @endforeach

                                                                </table>
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