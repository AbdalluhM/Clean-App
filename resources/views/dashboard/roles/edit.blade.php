@extends('admin.layouts.master')
@section('content')
@if (session()->has('error'))
<div class="alert alert-danger text-center" role="alert">
    {{session()->get('error')}}
</div>
@endif
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Add Role</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form action="{{route('roles.update',$role->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Role Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="name" value="{{$role->name}}"
                                class="form-control form-control-lg form-control-solid" placeholder="Role name">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <select name="permission[]" aria-label="Select a Main Category" data-control="select2"
                            data-placeholder="Select Permission"
                            class="form-select form-select-solid form-select-lg select2-hidden-accessible @error('permission') is-invalid @enderror"
                            data-select2-id="select2-data-13-i3r9" tabindex="-1" aria-hidden="true" multiple>
                            <option value="" data-select2-id="select2-data-15-ojrf">Select permission</option>

                            @foreach ($permission as $permission )
                            <option data-kt-flag="flags/indonesia.svg" value="{{$permission->id}}" @foreach (
                                $rolePermissions as $rolePermission) @if ($rolePermission===$permission->id)
                                selected
                                @endif
                                @endforeach
                                >
                                {{$permission->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('permission')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Update
                        Role</button>
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
