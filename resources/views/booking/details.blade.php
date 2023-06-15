@extends('layouts.admin', ['title' => 'User Accounts'])
                
@section('content')


<div class="content-body">
    <div class="container-fluid">
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


        <div class=" col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Timeline</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1"
                                        style="height:250px;">
                                        @php $data=DB::table('timelines')->where('booking_number',$groupBooking->booking_number)->get();
                                        @endphp
                                        <ul class="timeline">
                                            @foreach($data as $data)
                                            @if($data->status=='Awaiting')
                                            <li>
                                                <div class="timeline-badge primary"></div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>{{$data->created_at}}</span>
                                                    <h6 class="mb-0">{{$data->activity}} <strong
                                                            class="text-primary">$500</strong>.</h6>
                                                </a>
                                            </li>
                                            @elseif($data->status=='Pending')

                                            <li>
                                                <div class="timeline-badge info">
                                                </div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>{{$data->created_at}}</span>
                                                    <h6 class="mb-0">New order placed <strong
                                                            class="text-info">#XF-2356.</strong>
                                                    </h6>
                                                    <p class="mb-0">Quisque a consequat ante Sit...</p>
                                                </a>
                                            </li>
                                            @elseif($data->status=='canceled')
                                            <li>
                                                <div class="timeline-badge danger">
                                                </div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>{{$data->created_at}}</span>
                                                    <h6 class="mb-0">john just buy your product <strong
                                                            class="text-warning">Sell
                                                            $250</strong></h6>
                                                </a>
                                            </li>
                                            @else
                                            <li>
                                                <div class="timeline-badge success">
                                                </div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>{{$data->created_at}}</span>
                                                    <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-md-0 mt-5 col-md-7">
                                    
                                    <a class="timeline-panel text-muted" href="#">
                                        {{-- <span>20 minutes ago</span> --}}
                                        <p class="mb-0 small_text">New group order placed from Silex Secure Group<strong
                                                class="text-info"> {{$groupBooking->booking_number}}</strong>
                                        </p>
                                        {{-- <p class="mb-0">Quisque a consequat ante Sit...</p> --}}
                                    </a>
                                    {{-- <p>New group order placed from Silex Secure Group <span class="text-info">XF-2356</span> --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection