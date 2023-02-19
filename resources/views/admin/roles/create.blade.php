@extends('../admin/layout.sidemenu')


@section('subcontent')

<!--begin::Custom Page Header Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{__('messages.list', ['name' => 'Roles'])}}</h1>
            <!--end::Title-->

            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->

            <!--begin::Breadcrumb-->
            {{ Breadcrumbs::render('roles.create') }}
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>
<!--end::Custom Page Header Toolbar-->

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Careers - Apply-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::Hero-->
                <div class="position-relative mb-17">
                    <!--begin::Overlay-->
                    <div class="overlay overlay-show">
                        <!--begin::Title-->
                        <h3 class="fs-2qx fw-bolder mb-3 m">{{__('messages.list', ['name' => 'Role'])}}</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Overlay-->
                </div>
                <!--end::-->
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row mb-17">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-0 me-lg-20">

                        <!--begin::Form-->
                        {!! Form::open(array('route' => 'roles.store','method'=>'POST', 'class' => 'form mb-15')) !!}
                        @include('admin.roles.form')
                        <!--begin::Submit-->
                        <button type="submit" class="btn btn-primary">{{__('content.create_title')}}</button>
                        <!-- end::Submit -->
                        <!-- begin::Back  -->
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('roles.index') }}" class="text-white">{{__('content.back_title')}}</a>
                        </button>
                        <!-- end::Back  -->
                        {!! Form::close() !!}
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Careers - Apply-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection