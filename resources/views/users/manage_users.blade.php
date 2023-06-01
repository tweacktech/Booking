@extends('layouts.admin', ['title' => 'User Accounts'])
				
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Account</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                        </ol>
                    </div>
                </div>


                
        <div class="card" style="">
                                <!--begin::Card body-->
                                <div class="card-body" >
                                    <!--begin::Stepper-->
                                    <div class="stepper stepper-links d-flex flex-column " id="kt_create_account_stepper" >
                                       
                                        <!--begin::Nav-->
                                          <div class="card-toolbar">
                                            <a href="#" class="btn btn-flex btn-primary"data-toggle="modal" data-target="#loginModal">
                                            New  User
                                                 </a>
                                            </div>
                                        <!--end::Nav-->
                                        <!--begin::Form-->
                                        <div class="mx-auto " novalidate="novalidate" id="kt_create_account_form" style="width:80%;">
                                            <!--begin::Step 1-->
                                            <div class="current" data-kt-stepper-element="content">
                                                <!--begin::Wrapper-->
                                               
                                                <div class="row"> 
                                                <div class="w-100">
                                                    <!--begin::Heading-->
                                                    <div class="">
                                                        <!--begin::Title-->
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Manage Users
                                                        
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
                                                                    <th>User Name</th>
                                                                    <th>Type</th>
                                                                    <th>Verified</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                               
                                                            </thead>
                                                            <tbody class="fs-6">
                                                                @foreach($users as $user)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
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
                                                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">{{$user->name}}</a>
                                                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">{{$user->email}}</a>
                                                                            </div>
                                                                            <!--end::Info-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </td>
                                                                    <td><span class="badge badge-light-success fw-bolder px-4 py-3"> {{$user->type}}</span></td><td><span class="badge badge-light-success fw-bolder px-4 py-3">Verified</span></td>
                                                                   
                                                                   
                                                                    <td class="text-end">
                                                                        <a href="{{ route('edit_user_page', ['id' => md5($user->id) ]) }}" class="btn btn-info btn-sm">Edit</a>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <a href="#{{ route('user_role', ['id' => md5($user->id) ]) }}" class="btn btn-secondary btn-sm">User Role</a>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        @if($user->status == '1')
                                                                        <a href="{{ route('suspend_user', ['id' => md5($user->id) ]) }}" class="btn btn-primary btn-sm">Suspend</a>
                                                                        @endif
                                                                        @if($user->status == '0')
                                                                        <a href="{{ route('unsuspend_user', ['id' => md5($user->id) ]) }}" class="btn btn-secondary btn-sm">Unuspend</a>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <a href="{{ route('delete_user', ['id' => md5($user->id) ]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                            </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            
                                        </div>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Stepper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
    

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Login Form -->
                       <form action=" {{ route('register_user') }} " method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!--begin::Card-->
                                                                    <div class="card">
                                                                        <!--begin::Body-->
                                                                        <div class="card-body">
                                                                           
                                                                            <!--begin::Border-->
                                                                                                         
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">User Name</label>
                                                                                <input type="text" class="form-control form-control form-control-solid" name="name" />
                                                                            </div>

                                                                            @error('name')
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                            </div>
                                                                            @enderror

                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">User Email</label>
                                                                                <input type="text" class="form-control form-control form-control-solid" name="email" />
                                                                            </div>

                                                                            @error('email')
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                            </div>
                                                                            @enderror


                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Company</label>
                                                                                <select class="form-control form-control form-control-solid" name="company_id" >
                                                                                    @if (Auth::user()->type == "Supper") 
                                                                                    <option value=""></option>
                                                                                      @php $data=DB::table('companies')->get();
                                                                                       @endphp
                                                                                       @foreach($data as $data)
                                                                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                                                        @endforeach
                                                                                        @else
                                                                                          <option value="{{Auth::user()->company_id}}">{{ Auth::user()->company_id}}</option>
                                                                                          @endif

                                                                                </select>
                                                                            </div>

                                                                            @error('type')
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                            </div>
                                                                            @enderror

                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Account Type</label>
                                                                                <select class="form-control form-control" name="type" >
                                                                                    <option value=""></option>
                                                                                    <option value="Staff">Staff</option>
                                                                                    <option value="Owner">Owner</option>
                                                                                    <option value="Supper"> Supper</option>

                                                                                </select>
                                                                            </div>

                                                                            @error('type')
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                            </div>
                                                                            @enderror

                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">User Password</label>
                                                                                <input type="password" class="form-control form-control form-control-solid" name="password" />
                                                                            </div>

                                                                           

                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Confirm Password</label>
                                                                                <input type="password" class="form-control form-control form-control-solid" name="password_confirmation" />
                                                                            </div>


                                                                           
                                                                            @error('password')
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                            </div>
                                                                            @enderror
                                                                            <!--begin::Action-->
                                                                            <div class="d-flex align-items-center justify-content-end">
                                                                              
                                                                                <input type="submit" class="btn btn-primary" value='ADD NEW'>
                                                                            </div>
                                                                           
                                                                            @if(Session::has('message'))
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder " style="color:red" >{{  Session('message') }}</label>
                                                                            </div>
                                                                            @endif
                                                                            
                                                                            <!--end::Action-->
                                                                        </div>
                                                                        <!--end::Body-->
                                                                    </div>
                                                                    <!--end::Card-->
                                                                </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
