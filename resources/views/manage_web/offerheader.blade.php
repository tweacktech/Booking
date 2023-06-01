@extends('layouts.app', ['title' => 'Offer Edit'])

@section('content')
    <div class="card" style="100%">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Stepper-->
            <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">

                <!--begin::Nav-->
                <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                    <div class="stepper-nav mb-5" style="width:100%;">

                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <a href="{{ route('manage_web') }}">
                                <h3 class="stepper-title">Top Products</h3>
                            </a>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <a href="{{ route('featured_product') }}">
                                <h3 class="stepper-title">Featured Product</h3>
                            </a>
                        </div>

                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <a href="{{ route('web_content') }}">
                                <h3 class="stepper-title">Web Content </h3>
                            </a>
                        </div>

                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <a href="{{ route('slider') }}">
                                <h3 class="stepper-title">Slider</h3>
                            </a>
                        </div>

                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <a href="{{ route('website') }} ">
                                <h3 class="stepper-title">Website</h3>
                            </a>
                        </div>

                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <a href="{{ route('category_slider') }} ">
                                <h3 class="stepper-title">Manage Category Slider</h3>
                            </a>
                        </div>
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <a href="{{ route('manage_offer_slider') }} ">
                                <h3 class="stepper-title">Manage Offer Header</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <!--end::Nav-->
                <!--begin::Form-->
                @php
                    $promo = DB::table('promotimer')->first();
                @endphp

                <div>
                    <div class="text-end mb-3 col-7 m-auto">
                        @if ($promo->status == 1)
                            <a class="fw-bold btn btn-danger btn-sm" href="/switchoff">Off</a>
                        @else
                            <a class="fw-bold btn btn-success btn-sm" href="/switchoff">On</a>
                        @endif
                    </div>
                    <div class="col-12 col-md-7 m-auto">
                        <form action="/saveoffertimer" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="promo_percent">Percent Discount</label>
                                <input @if ($promo) value="{{ $promo->promo_percent }}" @endif
                                    name="promo_percent" type="text"class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="end_date">End Date</label>
                                <input @if ($promo) value="{{ $promo->end_date }}" @endif
                                    name="end_date" type="datetime-local"class="form-control">
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary btn-sm">save</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="mx-auto pt-15 pb-10" id="kt_create_account_form" novalidate="novalidate" style="width:100%;">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5"
                            style="height:200px">
                            <!--begin::Form-->
                            <form action=" {{ route('add_top_product') }} " enctype="multipart/form-data" method="POST">
                                @csrf
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <h4>Create Top Product</h4>
                                        <!--begin::Border-->

                                        @if (Session::has('message'))
                                            <div class="col-lg-16" style="text-align:center; flex:1">

                                                <input checked="checked" class="btn-check"
                                                    id="kt_create_account_form_account_type_personal" name="account_type"
                                                    type="radio" value="personal" />
                                                <label
                                                    class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10"
                                                    for="kt_create_account_form_account_type_personal">

                                                    <!--begin::Info-->
                                                    <span class="d-block fw-bold text-start">

                                                        <span class="text-muted fw-bold fs-3 badge badge-light-info">
                                                            <p
                                                                style="color:red; text-align:center; align-items: center;display:flex; flex:1;">
                                                                {{ Session('message') }}</p>
                                                        </span>

                                                    </span>
                                                    <!--end::Info-->
                                                </label>
                                                <!--end::Option-->
                                                <!-- endloop here -->
                                            </div>
                                        @endif
                                        <div class="separator separator-dashed my-8"></div>

                                        <div class="mb-5">
                                            <label class="fs-6 form-label fw-bolder text-dark">Products</label>
                                            <input class="form-control form-control form-control-solid" name="product">
                                        </div>

                                        @error('product')
                                            <div class="mb-5">
                                                <label class="fs-6 form-label fw-bolder "
                                                    style="color:red">{{ $message }}</label>
                                            </div>
                                        @enderror

                                        <div class="mb-5">
                                            <input class="btn btn-primary" type="submit" value="Create">
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </form>
                            <!--end::Form-->
                        </div>

                        <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Title-->
                                <h2 class="fw-bolder d-flex align-items-center text-dark">Manage Top Products

                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row">

                                <!-- display msg if there is any -->
                                @if (Session::has('alert'))
                                    <div class="col-lg-16" style="text-align:center; flex:1">

                                        <input checked="checked" class="btn-check"
                                            id="kt_create_account_form_account_type_personal" name="account_type"
                                            type="radio" value="personal" />
                                        <label
                                            class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10"
                                            for="kt_create_account_form_account_type_personal">

                                            <!--begin::Info-->
                                            <span class="d-block fw-bold text-start">

                                                <span class="text-muted fw-bold fs-3 badge badge-light-info">
                                                    <p
                                                        style="color:red; text-align:center; align-items: center;display:flex; flex:1;">
                                                        {{ Session('alert') }}</p>
                                                </span>

                                            </span>
                                            <!--end::Info-->
                                        </label>
                                        <!--end::Option-->
                                        <!-- endloop here -->
                                    </div>
                                @endif

                                <!-- end msg -->

                                <table class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder"
                                    id="kt_profile_overview_table">
                                    <!--begin::Head-->
                                    <thead class="fs-7 text-gray-400 text-uppercase">
                                        <tr>
                                            <th>S/N</th>
                                            <th>Product Name</th>
                                            <th>Added On</th>
                                            <th>Verified</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tbody class="fs-6">
                                        @foreach ($tops as $top)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $top->name }}</td>
                                                <td>{{ $top->createdAt }}</td>
                                                <td><span
                                                        class="badge badge-light-success fw-bolder px-4 py-3">Verified</span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('edit_top_product_page', ['id' => md5($top->id)]) }} ">Edit</a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('delete_top_product', ['id' => md5($top->id)]) }} ">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>

                </div> --}}
                <!--end::Stepper-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    @endsection
