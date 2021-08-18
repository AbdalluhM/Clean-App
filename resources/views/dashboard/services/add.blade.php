@extends('admin.layouts.master')
@section('content')
@section('title')
Services
@endsection
@section('defintion')
Home | Create-Service
@endsection

<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Add Service</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form action="{{route('services.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Image service</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url(/metronic8/demo1/assets/media/avatars/blank.png)">

                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url(/metronic8/demo1/assets/media/avatars/150-2.jpg)"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg"
                                    class="@error('image') is-invalid @enderror">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-12 col-form-label required fw-bold fs-6">Service Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <input type="text" name="name_ar"
                                class="form-control form-control-lg form-control-solid @error('name_ar') is-invalid @enderror"
                                placeholder="اسم الخدمة باللغة العربية">
                            @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                            <input type="text" name="name_en"
                                class="form-control form-control-lg form-control-solid @error('name_en') is-invalid @enderror"
                                placeholder="Service name english">
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    @if (isset($categories))
                    <div class="row mb-6">
                        <select name="category_id" aria-label="Select a Main service" data-control="select2"
                            data-placeholder="Select a Main Category"
                            class="form-select form-select-solid form-select-lg select2-hidden-accessible"
                            data-select2-id="select2-data-13-i3r9" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="select2-data-15-ojrf">Select a Main Category</option>
                            @foreach ($categories as $category )
                            <option data-kt-flag="flags/indonesia.svg" value="{{$category->id}}">
                                {{(app()->getLocale() == 'en')?$category->name_en:$category->name_ar}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Input-->
                    @endif
                    {{-- begin desc --}}
                    <div class="row mb-6">
                        <div class="d-flex flex-column mb-12">
                            <label class="fs-6 fw-bold mb-2">Service Details</label>
                            <textarea class="form-control form-control-solid" rows="3" name="desc"
                                placeholder="Type Category Details"></textarea>
                            @error('desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Save
                        service</button>
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
