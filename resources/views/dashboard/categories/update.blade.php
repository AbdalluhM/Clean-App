@extends('admin.layouts.master')
@section('content')
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Update Category</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('put')
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Image Category</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url({{url($category->category_image_path)}})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                            style="background-image: url({{url($category->category_image_path)}})"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image"  accept=".png, .jpg, .jpeg"class="@error('image') is-invalid @enderror" >
                                {{--  --}}
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
                <!--begin::Label-->
                <label class="col-lg-12 col-form-label required fw-bold fs-6">Category Name</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <input type="text" name="name_ar" value="{{$category->name_ar}}"
                        class="form-control form-control-lg form-control-solid @error('name_ar') is-invalid @enderror"
                        placeholder="اسم الصنف باللغة العربية">
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                    <input type="text" name="name_en" value="{{$category->name_en}}"
                        class="form-control form-control-lg form-control-solid @error('name_en') is-invalid @enderror"
                        placeholder="Category name english">
                    @error('name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                {{-- begin desc --}}
                <div class="d-flex flex-column mb-12">
                    <label class="fs-6 fw-bold mb-2">Category Details</label>
                    <textarea class="form-control form-control-solid" rows="3" name="desc"
                        placeholder="Type Category Details">{{$category->desc}}</textarea>
                        @error('desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
            </div>

                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Update
                        Category</button>
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
