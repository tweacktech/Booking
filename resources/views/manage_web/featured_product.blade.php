@extends('layouts.app', ['title' => 'Featured Products'])

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
                                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                                    <a href="{{route("featured_product")}}"><h3 class="stepper-title">Featured Product</h3></a>
                                                </div>
                                    
                                    
                                                <div class="stepper-item" data-kt-stepper-element="nav">
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
                                                <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5" style="height:200px">
                                                    <!--begin::Form-->
                                                    <form action=" {{ route('add_featured_product') }} " method="POST" enctype="multipart/form-data">
														@csrf
                                                        <!--begin::Card-->
                                                        <div class="card">
                                                            <!--begin::Body-->
                                                            <div class="card-body">
                                                               <h4>Create Featured Product</h4>
                                                                <!--begin::Border-->

                                                               
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
                                                                <div class="separator separator-dashed my-8"></div>

																
																<div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">Products</label>
																	<select class="form-control form-control form-control-solid" name="product" >
																		<option value="">Select Product</option>
                                                                        @foreach($products as $p)
                                                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                                                        @endforeach
																		
																	</select>
                                                                </div>

                                                                @error('product')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror
                                                               
                                                                
                                                                <div class="mb-5">
                                                                    <input type="submit" value="Create" class="btn btn-primary">
                                                                </div>
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Card-->
                                                    </form>
                                                    <!--end::Form-->
                                                </div>

												<div class="w-100">
													<!--begin::Heading-->
													<div class="pb-10 pb-lg-15">
														<!--begin::Title-->
														<h2 class="fw-bolder d-flex align-items-center text-dark">Manage Featured Products
														
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="fv-row">
														
                                                        <!-- display msg if there is any -->
                                                        @if(Session::has('alert'))
                                                            <div class="col-lg-16" style="text-align:center; flex:1">
																
																<input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
																	
																	<!--begin::Info-->
																	<span class="d-block fw-bold text-start">
                                                                  
    	                                                             <span class="text-muted fw-bold fs-3 badge badge-light-info" ><p  style = "color:red; text-align:center; align-items: center;display:flex; flex:1;"> {{Session('alert')}}</p> </span>

                                                                     
																		
																	</span>
																	<!--end::Info-->
																</label>
																<!--end::Option-->
																<!-- endloop here -->
															</div>
                                                        @endif

                                                        <!-- end msg -->
                                                        
                                                        <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                                            <!--begin::Head-->
                                                            <thead class="fs-7 text-gray-400 text-uppercase">
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th>Product Name</th>
                                                                    <th>Added On</th>
                                                                    <th>Verified</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                               
                                                            </thead>
                                                            <tbody class="fs-6">
                                                               @foreach ($featured as $f)
                                                                   <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $f->name }}</td>
                                                                    <td>{{ $f->createdAt }}</td>
                                                                    <td><span class="badge badge-light-success fw-bolder px-4 py-3">Verified</span></td>
                                                                    <td>
                                                                        <a href="{{ route('edit_featured_product_page', ['id' => md5($f->id) ]) }} " class="btn btn-info btn-sm">Edit</a>
                                                                        <a href="{{ route('delete_featured_product', ['id' => md5($f->id) ]) }} " class="btn btn-danger btn-sm">Delete</a>
                                                                    </td>
                                                                   </tr>
                                                               @endforeach
                                                            </tbody>
                                                        </table>
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