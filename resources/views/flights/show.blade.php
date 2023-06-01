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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Flight</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
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
                                    <form method="POST" action="{{ route('updateFlight', ['id' => $flight->id]) }}"
                                        enctype="multipart/form-data" >
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <input class="form-control-plaintext" type="text" placeholder="Readonly input here…" value="Arik Airline" readonly>
                                            <input type="hidden"   class="form-control" name="company_id" value="{{ $flight->company_id }}">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">flight_number</label>
                                            <div class="col-sm-9">
                                                <input type="text"   class="form-control" name="flight_number" value="{{ $flight->flight_number }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Origin</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="origin" name="origin" value="{{ $flight->origin }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">destination</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="destination" value="{{ $flight->destination }}" name="destination">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">departure</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" placeholder="departure" name="departure" value="{{ $flight->departure }}" min="{{ now()->format('Y-m-d') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">return_date</label>
                                            <div class="col-sm-9">
                                                <input type="date"  class="form-control" name="return_date" value="{{ $flight->return_date }}" min="{{ now()->format('Y-m-d') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">price</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="price" name="price" value="{{ $flight->price }}">
                                            </div>
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
