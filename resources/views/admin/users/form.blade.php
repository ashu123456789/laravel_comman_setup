<!--begin::Input group-->
<div class="row mb-5">
	<!--begin::Col-->
	<div class="col-md-6 fv-row">
		<!--begin::Label-->
		<label class="required fs-5 fw-bold mb-2">{{trans_choice('content.name_title', 1)}}</label>
		<!--end::Label-->
		<!--begin::Input-->
		{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control form-control-solid')) !!}
		<!--end::Input-->
		@if($errors->has('name'))
		<span style="color:red">{{$errors->first('name')}}</span>
		@endif
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-md-6 fv-row">
		<!--end::Label-->
		<label class="required fs-5 fw-bold mb-2">{{trans_choice('content.email_title', 1)}}</label>
		<!--end::Label-->
		<!--end::Input-->
		{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control form-control-solid')) !!}
		<!--end::Input-->
		@if($errors->has('email'))
		<span style="color:red">{{$errors->first('email')}}</span>
		@endif
	</div>
	<!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-5">
	<!--begin::Col-->
	<div class="col-md-6 fv-row">
		<!--begin::Label-->
		<label class="required fs-5 fw-bold mb-2">{{trans_choice('content.password_title', 1)}}</label>
		<!--end::Label-->
		<!--begin::Input-->
		{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control form-control-solid')) !!}
		<!--end::Input-->
		@if($errors->has('password'))
		<span style="color:red">{{$errors->first('password')}}</span>
		@endif
	</div>
	<!--end::Col-->
	<!--begin::Col-->
	<div class="col-md-6 fv-row">
		<!--end::Label-->
		<label class="fs-5 fw-bold mb-2">{{trans_choice('content.confirm_password_title', 1)}}</label>
		<!--end::Label-->
		<!--end::Input-->
		{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control form-control-solid')) !!}
		<!--end::Input-->
	</div>
	<!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-5 fv-row">
	<!--begin::Label-->
	<label class="d-flex align-items-center fs-5 fw-bold mb-2">
		<span class="required">{{trans_choice('content.role_title', 1)}}</span>
		<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select User Roles"></i>
	</label>
	<!--end::Label-->
	<!--begin::Select-->
	{!! Form::select('roles[]', $roles, isset($userRole) ? $userRole : [] , array('class' => 'form-select form-select-solid', 'data-control'=>'select2')) !!}
	<!--end::Select-->
	@if($errors->has('roles'))
	<span style="color:red">{{ $errors->first('roles') }}</span>
	@endif
</div>
<!--end::Input group-->

<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->