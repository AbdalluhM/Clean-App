@extends('admin.layouts.master')
@section('content')
@section('title')
Customer-Details
@endsection
@section('defintion')
Home | Customer-Details
@endsection
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{$customer->user_image_path}}" alt="image">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#"
                                    class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{$customer->name}}</a>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap flex-center">
                                    <!--begin::Stats-->
                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700">
                                            <span
                                                class="w-75px">{{($customer->orders->count()>0)?$customer->orders->count():0}}</span>
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2"
                                                            height="14" rx="1"></rect>
                                                        <path
                                                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <div class="fw-bold text-muted">Orders</div>
                                    </div>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_customer_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_customer_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                        <span class="svg-icon svg-icon-3">
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
                                        <!--end::Svg Icon-->
                                    </span></div>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <!--begin::Badge-->
                                    <div class="badge badge-light-info d-inline">Premium user</div>
                                    <!--begin::Badge-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Account ID</div>
                                    <div class="text-gray-600">
                                        {{($customer->socials->count()>0)?$customer->socials->social_id:00}}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$customer->email}}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5"> Address</div>
                                    @isset ($customer->address)
                                    <div class="text-gray-600">{{$address->street}},
                                        <br>{{$address->city->city}}
                                        <br>{{$address->state->state}}</div>
                                    @else
                                    <div class="text-gray-600">NOT YET</div>
                                    @endisset
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Connected Accounts-->
                    <!--end::Connected Accounts-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bolder mb-0">Payment Methods</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                    <!--begin::Option-->
                                    <div class="py-0" data-kt-customer-payment-method="row">
                                        <!--begin::Header-->
                                        <div class="py-3 d-flex flex-stack flex-wrap">
                                            <!--begin::Toggle-->
                                            <div class="d-flex align-items-center collapsible rotate"
                                                data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
                                                role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_payment_method_1">
                                                <!--begin::Arrow-->
                                                <div class="me-3 rotate-90">
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path
                                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Arrow-->
                                                <!--begin::Logo-->
                                                <img src="/metronic8/demo1/assets/media/svg/card-logos/mastercard.svg"
                                                    class="w-40px me-3" alt="">
                                                <!--end::Logo-->
                                                <!--begin::Summary-->
                                                <div class="me-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-800 fw-bolder">Mastercard</div>
                                                        <div class="badge badge-light-primary ms-5">Primary</div>
                                                    </div>
                                                    <div class="text-muted">Expires Dec 2024</div>
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Toggle-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex my-3 ms-9">
                                                <!--begin::Edit-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                                        data-bs-original-title="Edit">
                                                        <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <path
                                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)">
                                                                </path>
                                                                <path
                                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </a>
                                                <!--end::Edit-->
                                                <!--begin::Delete-->
                                                <a href="#"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="tooltip" title=""
                                                    data-kt-customer-payment-method="delete"
                                                    data-bs-original-title="Delete">
                                                    <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                                    <span class="svg-icon svg-icon-3 mt-n1">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                    fill="#000000" fill-rule="nonzero"></path>
                                                                <path
                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--end::Delete-->
                                                <!--begin::More-->
                                                <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="tooltip" title="" data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end"
                                                    data-bs-original-title="More Options">
                                                    <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                    fill="#000000"></path>
                                                                <path
                                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-payment-mehtod-action="set_as_primary">Set as
                                                            Primary</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                                <!--end::More-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10"
                                            data-bs-parent="#kt_customer_view_payment_method">
                                            <!--begin::Details-->
                                            <div class="d-flex flex-wrap py-5">
                                                <!--begin::Col-->
                                                <div class="flex-equal me-5">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Name</td>
                                                                <td class="text-gray-800">{{$customer->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Number</td>
                                                                <td class="text-gray-800">{{$customer->phone}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Type</td>
                                                                <td class="text-gray-800">
                                                                    {{($customer->payment)?$customer->payment->type_payment:0}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">ID</td>
                                                                <td class="text-gray-800">
                                                                    {{($customer->payment)?$customer->payment->transaction_id:0}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="flex-equal">
                                                    <table class="table table-flush fw-bold gy-1">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Billing
                                                                    address</td>
                                                                <td class="text-gray-800">AU</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Email</td>
                                                                <td class="text-gray-800">
                                                                    <a href="#"
                                                                        class="text-gray-900 text-hover-primary">e.smith@kpmg.com.au</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">CVC check
                                                                </td>
                                                                <td class="text-gray-800">Passed
                                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Double-check.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-success">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px"
                                                                            viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1"
                                                                                fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24">
                                                                                </polygon>
                                                                                <path
                                                                                    d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z"
                                                                                    fill="#000000" fill-rule="nonzero"
                                                                                    opacity="0.5"
                                                                                    transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002)">
                                                                                </path>
                                                                                <path
                                                                                    d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z"
                                                                                    fill="#000000" fill-rule="nonzero"
                                                                                    transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002)">
                                                                                </path>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2 class="fw-bolder">Credit Balance</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="fw-bolder fs-2">{{($customer->payment)?$customer->payment->total:0}}
                                        <span class="text-muted fs-4 fw-bold">USD</span>
                                        <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on
                                            the customer's next invoice.</div>
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-2 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Orders</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Tab Content-->
                                    <div id="kt_referred_users_tab_content" class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active"
                                            role="tabpanel">
                                            <!--begin::Table-->
                                            <div id="kt_customer_details_invoices_table_1_wrapper"
                                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="table-responsive">
                                                    <table id="kt_customer_details_invoices_table_1"
                                                        class="table align-middle table-row-dashed fs-6 fw-bolder gy-5 dataTable no-footer"
                                                        role="grid">
                                                        <!--begin::Thead-->
                                                        <thead
                                                            class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                                            <tr class="text-start text-muted gs-0" role="row">
                                                                <th class="min-w-50px">Order Id</th>
                                                                <th class="min-w-120px">Amount</th>
                                                                <th class="min-w-120px text-end">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <!--end::Thead-->
                                                        <!--begin::Tbody-->
                                                        <tbody class="fs-6 fw-bold text-gray-600">
                                                            @foreach ($orders as $order)
                                                            <tr class="odd">
                                                                <td data-order="Invalid date">
                                                                    <a href="#"
                                                                        class="text-gray-600 text-hover-primary">{{$order->id}}</a>
                                                                </td>
                                                                <td class="text-success">{{$order->total_price}}</td>
                                                                <td class="text-end">
                                                                   {{$order->status}}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <!--end::Tbody-->
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div
                                                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                        <div class="dataTables_paginate paging_simple_numbers"
                                                            id="kt_customer_details_invoices_table_1_paginate">
                                                            <ul class="pagination">
                                                                <li class="paginate_button page-item previous disabled"
                                                                    id="kt_customer_details_invoices_table_1_previous">
                                                                    <a href="#"
                                                                        aria-controls="kt_customer_details_invoices_table_1"
                                                                        data-dt-idx="0" tabindex="0"
                                                                        class="page-link"><i class="previous"></i></a>
                                                                </li>
                                                                <li class="paginate_button page-item active"><a href="#"
                                                                        aria-controls="kt_customer_details_invoices_table_1"
                                                                        data-dt-idx="1" tabindex="0"
                                                                        class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#"
                                                                        aria-controls="kt_customer_details_invoices_table_1"
                                                                        data-dt-idx="2" tabindex="0"
                                                                        class="page-link">2</a></li>
                                                                <li class="paginate_button page-item next"
                                                                    id="kt_customer_details_invoices_table_1_next"><a
                                                                        href="#"
                                                                        aria-controls="kt_customer_details_invoices_table_1"
                                                                        data-dt-idx="3" tabindex="0"
                                                                        class="page-link"><i class="next"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Tab panel-->
                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
@endsection
