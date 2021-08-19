@extends('admin.layouts.master')
@section('content')
@section('title')
Recieve-Details
@endsection
@section('defintion')
Home | Recieve-Details
@endsection
<div class="col-xl-12 ">
    <!--begin::Tables Widget 9-->
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header bRecieve-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Recieve Detail</span>
                <span class="text-muted mt-1 fw-bold fs-7">about Recieves deatails</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive d-flex">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 ">
                    <!--begin::Table head-->
                    <thead >
                        <tr class="fw-bolder text-muted">
                            <th class="w-25px">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                                        data-kt-check-target=".widget-9-check" />
                                </div>
                            </th>
                            <th class="min-w-120px">User Name</th>
                            <th class="min-w-150px">Address Recieve</th>
                            <th class="min-w-120px">Service</th>
                            <th class="min-w-120px">Number Workers</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($recieveDetails as $deatails)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                    {{$deatails->recieve->customer->first()->name}}</p>
                            </td>
                            <td>
                                <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                    {{$deatails->recieve->address}}</p>
                            </td>
                            <td>
                                <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                    {{-- {{$deatails->sup_category->name}} --}}
                                    {{(app()->getLocale() == 'en')?$deatails->sup_category->name_en:$deatails->sup_category->name_ar}}
                                </p>
                            </td>
                            <td>
                                <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                    {{$deatails->num_workers}}</p>
                            </td>
                            {{-- <td>
                                <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                    @if (isset($deatails->product->delivery))
                                    {{$deatails->product->delivery}}
                                    @else
                                    <span class="badge badge-light-danger">Free</span>
                                    @endif
                                    </p>
                            </td>
                            <td>
                                <p class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                    {{$deatails->product->price*$deatails->qty-$deatails->discount +$deatails->product->delivery}}</p>
                            </td> --}}
                            {{-- <td class="text-end">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">50%</span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td> --}}

                        </tr>
                        @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
            <div class="container">
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                            <div class="d-flex ">
                                {!! $recieveDetails->render() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
</div>
@endsection
