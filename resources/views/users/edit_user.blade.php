@extends('layouts.admin', ['title' => 'Edit User Page'])

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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Account</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Users update</a></li>
                        </ol>
                    </div>
                </div>


                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Readonly</h4>
                                  <a href="javascript:history.back()" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action=" {{ route('edit_user') }} " method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <input class="form-control-plaintext" type="text" placeholder="Readonly input here…" value="Arik Airline" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">User Name</label>
                                            <div class="col-sm-9">
                                                <input type="text"   class="form-control"  name="name" value="{{ $user->name }}">
                                            </div>
                                           					 @error('name')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">User Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Email"  name="email" value="{{ $user->email }}" >
                                            </div>

                                                                @error('email')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="password" name="password" value="" >
                                            </div>
                                           					 @error('password')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="password_confirmation" name="password_confirmation" value="">
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-end">
                                                                    <input type="hidden" value="{{ $user->id }}" name="id" class="btn btn-primary">
                                                                    <input type="submit" class="btn btn-primary" value='UPDATE'>
                                                                      <a href="{{ route('manage_user_account') }}" class="btn btn-secondary" >Back</a>

                                                                </div>
                                                                @if(Session::has('message'))
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  Session('message') }}</label>
                                                                </div>
                                                                @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
	

            </div>
        </div>
@endsection









