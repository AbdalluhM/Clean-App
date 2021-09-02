@extends('admin.layouts.master')
@section('content')
@section('title')
Recieves Employee
@endsection
@section('defintion')
add employee || for recieve
@endsection

<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Add Employee</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form action="{{route('recieves.emp.store',$recieve->id)}}" method="post">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    @if ($users->count()>0)
                    <div class="row mb-6">
                        <select name="employee_id" aria-label="Select a Main Category" data-control="select2"
                            data-placeholder="Select employee"
                            class="form-select form-select-solid form-select-lg select2-hidden-accessible"
                            data-select2-id="select2-data-13-i3r9" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="select2-data-15-ojrf">Select a employee</option>
                            @foreach ($users as $user )
                            <option data-kt-flag="flags/indonesia.svg" value="{{$user->id}}">
                                {{$user->name}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>

                    @endif
                    <!--end::Input group-->
                    <div class="row mb-6">
                        <div class="col-md-6 fv-row">
                            <div class="d-flex flex-stack mb-8">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <label class="fs-6 fw-bold">Make This Recieve Completed</label>
                                    <div class="fs-7 fw-bold text-gray-400">this recieve will be completed
                                    </div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input type="hidden" name="status" value="0" />
                                    <input class="form-check-input" type="checkbox" value="1" checked="checked"
                                        name="status">
                                    <span class="form-check-label fw-bold text-gray-400">Completed</span>
                                </label>
                                <!--end::Switch-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Save
                        employee</button>
                </div>
                <!--end::Actions-->
                {{-- <input type="hidden"> --}}
                <div></div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
</div>
@endsection
