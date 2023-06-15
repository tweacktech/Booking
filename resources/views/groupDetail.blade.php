@extends('layouts.admin', ['title' => 'User Accounts'])
				
@section('content')

  <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="first">
                                                <img class="img-fluid" src="{{ asset('public/images/airplane-ticket.png') }}"
                                            alt="">
                                            </div>
                                            <p>Booking code: <span class="item">{{$groupBooking->booking_number}}</span> </p>
                                                <p>Team Size: <span class="item">{{$groupBooking->group_size}}</span></p>
                                                <p>status: <span class="item badge btn light small_text badge-warning">{{$groupBooking->status}}</span></p>
                                                <p>Members: involved <span class="">{{$groupBooking->emails}}</span></p>
                                                <p>Product tags:&nbsp;
                                                    <span class="badge badge-success light">bags</span>
                                                    <span class="badge badge-success light">clothes</span>
                                                    <span class="badge badge-success light">shoes</span>
                                                    <span class="badge badge-success light">dresses</span>
                                                </p>
                                                
                                        </div> 
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-9 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr">
                                                <h4>Group Name: {{$groupBooking->group_name}}</h4>
                                                <div class="star-rating mb-2">
                                                    <ul class="produtct-detail-tag">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <span class="review-text">(34 reviews) / </span>
                                                </div>
                                                <p class="price">₦
                                                     @if($groupBooking->price!='') paid{{$groupBooking->price}} @else {{$groupBooking->proposted}} @endif</p>
                                                <p>Availability: <span class="item"> In stock <i
                                                            class="fa fa-shopping-basket"></i></span>
                                                </p>
                                                
                                                <div class="filtaring-area my-3">
                                                    <div class="size-filter">
                                                        <h4 class="m-b-15">Propost Price</h4>
                                                    </div>
                                                </div>
                                                <!--Quantity start-->
                                                @if($groupBooking->proposted=='' && $groupBooking->total_price=='')
                                                <form action="{{route('updatePrice',['id'=>$groupBooking->id])}}" method="POST">
                                                    @csrf
                                                    @method('post')
                                                <div class="col-2 px-0">
                                                    <input type="number" name="proposted" class="form-control input-btn input-number" placeholder="Price ₦" required>
                                                </div>
                                                <!--Quanatity End-->
                                                <div class="shopping-cart mt-3">
                                                    <button class="btn btn-primary btn-lg" type="submit"><i
                                                            class="fa fa-shopping-basket mr-2"></i>Make proposed</button>
                                                </div>
                                                </form>
                                                @elseif($groupBooking->proposted!='' &&$groupBooking->status=='pending')
                                                <span class="badge btn light small_text badge-warning">pending</span>
                                                @else
                                                <span class="badge btn light small_text badge-success">approved</span>
                                                <!-- esle
                                                <span class="badge btn light small_text badge-info">Awaiting</span>
 -->                                                @endif
                                                <p class="text-content">{{$groupBooking->message}}</p>
                                            </div>

                                            <!-- {{$groupBooking->emails}} -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body"><center><h3>Passengers</h3></center>
                                <div class="row">
                                      @php  $data=DB::table('passengers')->where('booking_number',$groupBooking->booking_number)->get();
                                      $c=1; @endphp
                                      @foreach($data as $data)
                                    <div class="col-xl-3 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                         {{$c++}}
                                            <p>Full Name: <span class="item">{{$data->name}}</span> </p>
                                                <p>email: <span class="item">{{$data->email}}</span></p>
                                                <p>Phone: <span class="item">{{$data->phone}}</span></p>
                                                <p>passport_no: <span class="item badge btn btn light larg_text badge-warning">{{$data->passport_no}}</span></p>
                                          </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection