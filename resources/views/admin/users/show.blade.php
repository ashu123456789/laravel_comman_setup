@extends('../admin/users/details')

@section('users_breadcrumbs')
<!--begin::Custom Page Header Toolbar-->
<div class="toolbar" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		<!--begin::Page title-->
		<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
			<!--begin::Title-->
			<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{__('messages.list', ['name' => 'User'])}}</h1>
			<!--end::Title-->

			<!--begin::Separator-->
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<!--end::Separator-->

			<!--begin::Breadcrumb-->
			{{ Breadcrumbs::render('users.show') }}
			<!--end::Breadcrumb-->
		</div>
		<!--end::Page title-->

	</div>
	<!--end::Container-->
</div>
<!--end::Custom Page Header Toolbar-->
@endsection
@section('tabcontent')
<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
	<!--begin::Card header-->
	<div class="card-header cursor-pointer">
		<!--begin::Card title-->
		<div class="card-title m-0">
			<h3 class="fw-bolder m-0">{{__('content.profile_details')}}</h3>
		</div>
		<!--end::Card title-->
	</div>
	<!--begin::Card header-->
	<!--begin::Card body-->
	<div class="card-body p-9">
		<!--begin::Row-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">{{trans_choice('content.name_title', 1)}}</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				<span class="fw-bolder fs-6 text-dark">{{ $user->name }}</span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">{{trans_choice('content.email_title', 1)}}</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8 fv-row">
				<span class="fw-bold fs-6">{{ $user->email }}</span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">{{trans_choice('content.phone_title', 1)}}
				<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8 d-flex align-items-center">
				<span class="fw-bolder fs-6 me-2">044 3276 454 935</span>
				<span class="badge badge-success"> </span>
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="row mb-7">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">{{trans_choice('content.role_title', 1)}}</label>
			<!--end::Label-->
			<!--begin::Col-->
			<div class="col-lg-8">
				@if(!empty($user->getRoleNames()))
				@foreach($user->getRoleNames() as $v)
				<span class="fw-bolder fs-6 text-dark">{{ $v }}</span>
				@endforeach
				@endif
			</div>
			<!--end::Col-->
		</div>
		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="row mb-10">
			<!--begin::Label-->
			<label class="col-lg-4 fw-bold text-muted">{{__('content.allow_changes')}}</label>
			<!--begin::Label-->
			<!--begin::Label-->
			<div class="col-lg-8">
				<span class="fw-bold fs-6">{{__('content.yes')}}</span>
			</div>
			<!--begin::Label-->
		</div>
		<!--end::Input group-->
	</div>
	<!--end::Card body-->
</div>
<!--end::details View-->
@endsection