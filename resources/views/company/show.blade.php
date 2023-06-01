@extends('layouts.admin',  ['title' => 'Dashboard'])

@section('content')

	        <div class="content-body">
            <div class="container-fluid">

                 <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <!-- <span>Activities</span> -->
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Company</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">manage</a></li>
                        </ol>
                    </div>
                </div>
                
                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Company</h4>
                                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('updateCompany', ['id' => $company->id]) }}"
                                        enctype="multipart/form-data" >
                                        @csrf
                                        @method('put')

                                         <div class="form-group">
                                <label for="name">name:</label>
                                <input type="text" class="form-control" id="name" 
                               name="name" value="{{$company->name}}" required>
                                                             @error('name')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" 
                               name="email" value="{{$company->email}}" required>
                                                             @error('email')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>
                              <div class="form-group">
                                <label for="address">address:</label>
                                <input type="text" class="form-control" id="address" 
                               name="address" value="{{$company->address}}" required>
                                                             @error('address')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact">Phone contact:</label>
                                <input type="number" min="0" class="form-control" id="contact" 
                               name="contact" value="{{$company->contact}}" required>
                                                               @error('contact')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>

                             <div class="form-group">
                                <img src="{{asset('/logos'.$company->logo)}}" alt="pic" style="width: 20px;">
                                <label for="Logo">Logo:</label>
                                <input type="file" min="100" class="form-control" id="Logo" 
                               name="Logo" value="{{$company->logo}}" required>
                                                             @error('Logo')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>
                            
                                         <button type="submit" class="btn btn-lg btn-primary">Update
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="18" y="13" width="13"
                                                        height="2" rx="1" transform="rotate(-180 18 13)"
                                                        fill="black" />
                                                    <path
                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

					
                </div>
            </div>

@endsection
