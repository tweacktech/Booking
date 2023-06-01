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


                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Company</h4>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Add Company</button>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  <table id="example5" style="min-width: 845px"  class="table display table-row-bordered align-middle">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>

                            <th class="min-w-50px">name</th>
                            <th class="min-w-50px">email</th>
                            <th class="min-w-50px">Address</th>
                            <th class="min-w-50px">contact</th>
                            <th class="min-w-50px">Logo</th>
                            <th class="min-w-50px">Status</th>
                            <th class="min-w-50px ">Action</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        
                        @foreach ($company as $data)
                            <tr>

                                <td>
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Wrapper-->
                                        <div class="me-5 position-relative">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                
                                            </div>
                                            <!--end::Avatar-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href=""
                                                class="fs-6 text-gray-800 text-hover-primary">{{ $data->name }}</a>

                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </td>
                               
                                <td>
                                     {{$data->email}}

                                </td> 

                                <td>
                                     {{$data->address}}

                                </td> 

                                <td>
                                     {{$data->contact}}

                                </td> 
                                <td>
                                     {{$data->logo}}

                                </td> 
                                          

                                <td>
                                    @if ($data->status == 0)
                                        <span class="badge badge-light-info fw-bolder px-4 py-3">Inactive</span>
                                    @elseif($data->status == 1)
                                        <span class="badge badge-light-success fw-bolder px-4 py-3">Active</span>
                                    @endif
                                </td>

                               <td>
                                    <a href="{{ route('editCompany', ['id' => $data->id]) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                    @if ($data->status == 1)
                                        <a href="{{ route('hideCompany', ['id' => $data->id]) }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-eye"></i> Hide</a>
                                    @elseif($data->status == 0)
                                        <a href="{{ route('unhideCompany', ['id' => $data->id]) }}"
                                            class="btn btn-light btn-sm">Unhide</a>
                                    @endif
                                    <a href="{{ route('deleteCompany', ['id' => $data->id]) }}"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                               </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Body-->
                </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>



 <div class="modal fade bd-example-modal-lg" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Company Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Login Form -->
                        <form id="loginForm" action="{{route('addCompany')}}" method="POST"enctype="multipart/form-data" >
                        @csrf
                        @method('post')
                            <div class="form-group">
                                <label for="name">name:</label>
                                <input type="text" class="form-control" id="name" 
                               name="name" required>
                                                             @error('name')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" 
                               name="email" required>
                                                             @error('email')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>
                              <div class="form-group">
                                <label for="address">address:</label>
                                <input type="text" class="form-control" id="address" 
                               name="address" required>
                                                             @error('address')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact">Phone contact:</label>
                                <input type="number" min="0" class="form-control" id="contact" 
                               name="contact" required>
                                                               @error('contact')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>

                             <div class="form-group">
                                <label for="Logo">Logo:</label>
                                <input type="file" min="100" class="form-control" id="Logo" 
                               name="Logo" required>
                                                             @error('Logo')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                            @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
