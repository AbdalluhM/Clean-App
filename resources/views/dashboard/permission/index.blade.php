@extends('admin.layouts.master')
@section('content')
@section('title')
Permissions
@endsection
@section('defintion')
Home | all - Permissions
@endsection
<div class="col-xl-12 ">
    <!--begin::Tables Widget 9-->
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Permission</span>
                <span class="text-muted mt-1 fw-bold fs-7">permissions users </span>
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
                            <th class="min-w-200px">No</th>
                            <th class="min-w-200px ">Name</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    {{-- <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Ana Simmons</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                                    <span
                                        class="text-dark fw-bolder text-hover-primary fs-6">{{$i++}}</span>

                                </div>
                            </div>
                        </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="d-flex justify-content-start flex-column">
                                        {{-- <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Ana Simmons</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                                        <span
                                            class="text-dark fw-bolder text-hover-primary fs-6">{{$permission->name}}</span>
                                    </div>
                                </div>
                            </td>

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
                                {!! $permissions->render() !!}
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
