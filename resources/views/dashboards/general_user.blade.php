<!-- @extends('layouts.admin', ['title' => 'User Accounts'])
                
@section('content') -->

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
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Activities</a></li>
                        </ol>
                    </div>
                </div>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        <div class="row g-5 g-xl-8">
            
            <div class="col-xl-12 ps-xl-12">
           
                <div class="card mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Activities</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="border-0">
                                              
                                             
                                                <th class="p-0 min-w-140px">Action</th>
                                                <th class="p-0 min-w-110px">Action Type</th>
                                                <th class="p-0 min-w-50px">Date</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                             @php
                                   
                                            $activities = DB::table('activities')
                                           ->where('status', '1')
                                           ->orderby('date_time', 'desc')
                                           ->limit(15)
                                            ->get();
                                          
   
                                       @endphp

                                       @foreach($activities as $activity)
                                       <tr>
                                               
                                        
                                        <td class="text-muted fw-bold">{{ $activity->activity}}</td>
                                        <td >
                                            {{ $activity->activity_type}}
                                        </td>
                                        <td >
                                            {{ $activity->date_time}}
                                        </td>
                                    </tr>
                                       @endforeach
                                           
                                      
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
                <!--begin::Row-->
                
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->

    </div>
</div>
@endsection