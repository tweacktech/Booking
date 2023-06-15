@extends('layouts.admin', ['title' => 'User Accounts'])
				
@section('content')


<div class="content-body">
    <div class="container-fluid">

<div class="row">
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div type="button" class="card-body d-flex align-items-center justify-content-around"
                                    data-toggle="modal" data-target=".bd-example-modal-lg">

                                    <div class="p-md-3">
                                        <img class="img-fluid" src="{{ asset('images/airplane-ticket.png') }}"
                                            alt="">
                                    </div>
                                    <p class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">17</p>
                                </div>
                                <p class="text-center mt-md-n4">Adhoc Group Request</p>
                            </div>
                        </div>  
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body d-flex align-items-center justify-content-around">
                                    {{-- <div class="row">
                                        <div class="col"> --}}
                                    <div class="p-md-3">
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('images/viewrequest.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <p class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">31</p>
                                    {{-- </div>
                                    </div> --}}
                                </div>
                                <p class="text-center mt-md-n4">View Request</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div href="" data-toggle="modal" {{-- data-target="#exampleModalCenter"> --}} <div type="button"
                                    class="card-body d-flex align-items-center justify-content-around data-toggle="modal"
                                    data-target="#paymentModal">
                                    <div class="p-md-3">
                                        <img class="img-fluid" src="{{ asset('images/cashless-payment .png') }}"
                                            alt="">
                                    </div>
                                    <p class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">22</p>
                                </div>
                                <p class="text-center mt-md-n4">Make Payment</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div type="button" class="card-body d-flex align-items-center justify-content-around"
                                    data-toggle="modal" data-target="#addModal">
                                    <div class="p-md-3 col-8">
                                        <img class="img-fluid" src="{{ asset('images/add-friend.png') }}" alt="">
                                    </div>
                                </div>
                                <p class="text-center mt-md-n4">Add Guest</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body d-flex align-items-center justify-content-around">
                                    {{-- <div class="row">
                                        <div class="col"> --}}
                                    <div class="p-md-3 col-8">
                                        <a href="{{url('goup')}}">
                                            <img class="img-fluid" src="{{ asset('images/viewbooking.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    {{-- </div>
                                    </div> --}}
                                </div>
                                <p class="text-center mt-md-n4">View Booking</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body d-flex align-items-center justify-content-">
                                    {{-- <div class="row">
                                        <div class="col"> --}}
                                    <div class="p-md-3 col-8">
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('images/help-desk 1.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    {{-- <p class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">17</p> --}}
                                    {{-- </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	</div>
</div>
@endsection