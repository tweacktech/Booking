@extends('layouts.admin', ['title' => 'User Accounts'])
                
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Group</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Approved</a></li>
                            </ol>
                 </div>
            </div>
                <div class="card">
                        <div class="card-header border-0 pb-0 justify-content-end">
                            <div class="d-flex align-items-center px-1 border border-dark rounded">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M11 2a9 9 0 1 0 5.618 16.032l3.675 3.675a1 1 0 0 0 1.414-1.414l-3.675-3.675A9 9 0 0 0 11 2Zm-6 9a6 6 0 1 1 12 0a6 6 0 0 1-12 0Z"
                                            clip-rule="evenodd" />
                                    </svg> </span>
                                <input type="text" class="form-control input-sm border-0" placeholder="Username">
                            </div>

                        </div>
                        <div class="card-body">

                <div class="table-responsive">          
                     <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width:20px;">
                                                <div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll"
                                                        required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="d-flex">Group Name <span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                            <th>Travel Date<span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                            <th>Travel Type <span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                            <th>Ticket ID <span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                            <th>Offer Details <span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                            <th>Action <span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                            <th>Status <span class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2" d="M3 6h18M6 12h12m-9 6h6" />
                                                    </svg></span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- @php $data=DB::table('group_bookings')->get();@endphp -->
                                        @foreach($groupBookings as $data)
                                        <tr>

                                            <td style="width:20px;">
                                                <div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll"
                                                        required="">
                                                    <label class="custom-control-label" for="checkAll"></label>
                                                </div>
                                            </td>
                                            <td class="small_text ox_text"><a href="{{route('groupshow',['id'=>$data->id])}}">{{$data->group_name}}</a></td>
                                            <td class="small_text"><b>{{$data->group_name}}</td>
                                            <td class="small_text"><b>{{$data->trip_type}}</td>
                                            <td class="small_text">9348fjr73</td>
                                            <td class="small_text">25,000.00</td>
                                            <td>
                                                @if($data->status=='pending')
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-warning small_text light sharp"
                                                        data-toggle="dropdown">
                                                        Pending <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" d="m7 10l5 5l5-5" />
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('groupshow',['id'=>$data->id])}}">Show</a>
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge btn light small_text badge-warning">pending</span>
                                            </td>
                                            @elseif($data->status=='approved')
                                            <div class="dropdown">
                                                    <button type="button" class="btn btn-success small_text light sharp"
                                                        data-toggle="dropdown">
                                                        Completed<svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" d="m7 10l5 5l5-5" />
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('groupshow',['id'=>$data->id])}}">Show</a>
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge btn light small_text badge-success">Successful</span>
                                            </td>
                                            @else($data->status=='canceled')
                                            <div class="dropdown">
                                                    <button type="button"
                                                        class="btn btn-secondary small_text light sharp"
                                                        data-toggle="dropdown">
                                                        In-progress<svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" d="m7 10l5 5l5-5" />
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('groupshow',['id'=>$data->id])}}">Show</a>
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge btn light small_text badge-secondary">In-Progress</span>
                                            </td>
                                            @endif

                                        </tr>
                                        @endforeach
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection