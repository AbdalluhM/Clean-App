@extends('admin.layouts.master')
@section('content')
@section('title')
Customers
@endsection
@section('defintion')
Home |All Customers
@endsection
<div id="kt_content_container" class="container">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path
                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path
                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                    fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers">
                </div>
                <!--end::Search-->
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                        id="kt_customers_table" role="grid">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                                            data-kt-check-target=".widget-9-check" />
                                    </div>
                                </th>
                                <th class="min-w-150px">Customer Name</th>
                                <th class="min-w-120px">Email</th>
                                <th class="min-w-120px">Phone</th>
                                <th class="min-w-120px">Payment Method </th>
                                <th class="min-w-120px">Created Date</th>
                                <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 79.625px;">Actions</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($users as $user)
                            <tr >
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1">
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Name=-->
                                <td>
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                                </td>
                                <!--end::Name=-->
                                <!--begin::Email=-->
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">{{$user->email}}</a>
                                </td>
                                <!--end::Email=-->
                                <!--begin::Company=-->
                                <td>{{$user->phone}}</td>
                                <!--end::Company=-->
                                <!--begin::Payment method=-->
                                <td data-filter="mastercard">
                                    <img src="{{asset('/assets/media/svg/card-logos/mastercard.svg')}}"
                                        class="w-35px me-3" alt="">

                                    </td>
                                <!--end::Payment method=-->
                                <!--begin::Date=-->
                                <td data-order="2020-12-14T20:43:00+02:00">{{$user->created_at}}</td>
                                <!--end::Date=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-flip="top-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true" style="">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{route('customers.details',$user->id)}}"
                                                class="menu-link px-3">View</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"
                                                data-kt-customer-table-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                 <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                            <div class="d-flex ">
                                {!! $users->render() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</div>

@endsection
