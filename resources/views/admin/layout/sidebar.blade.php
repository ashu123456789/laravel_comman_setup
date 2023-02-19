				@php
				function checkActiveSideBar(Array $links){
				foreach ($links as $link) {
				if(request()->is('*admin/'.$link.'*')){
				return true;
				}
				}
				return false;
				}
				@endphp

				<!--begin::Aside menu-->
				<div class="aside-menu flex-column-fluid">
					<!--begin::Aside Menu-->
					<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
						<!--begin::Menu-->
						<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
							<div class="menu-item">
								<a href="{{url('/admin/home')}}" class="menu-link {{ (request()->is('*home*'))? 'menu-item active' : '' }}">
									<span class="menu-icon">
										<!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
												<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<span class="menu-title">{{__('content.dashboard')}}</span>
								</a>
							</div>

							<div class="menu-item">
								<div class="menu-content pt-8 pb-2">
									<span class="menu-section text-muted text-uppercase fs-8 ls-1">NEW Section</span>
								</div>
							</div>
							<div class="menu-item">
								<a class="menu-link {{ (request()->is('*users*')) ? 'menu-item active' : '' }}" href="{{ route('users.index') }}">
									<span class="menu-icon">
										<i class="bi bi-house fs-3"></i>
									</span>
									<span class="menu-title">{{trans_choice('content.user', 2)}}</span>
								</a>
							</div>
							@can('role-list')
							<div class="menu-item">
								<a class="menu-link {{ (request()->is('*roles*')) ? 'menu-item active' : '' }}" href="{{ route('roles.index') }}">
									<span class="menu-icon">
										<i class="bi bi-app-indicator fs-3"></i>
									</span>
									<span class="menu-title">{{trans_choice('content.role', 2)}}</span>
								</a>
							</div>
							@endcan

							@canany(['permissions-list', 'permissions-create', 'permissions-edit', 'permissions-delete'])
							<div class="menu-item">
								<a class="menu-link {{ checkActiveSideBar(['permissions']) ? 'menu-item active' : '' }}" href="{{ route('permissions.index') }}">
									<span class="menu-icon">
										<i class="bi bi-house fs-3"></i>
									</span>
									<span class="menu-title">{{trans_choice('content.permission', 2)}}</span>
								</a>
							</div>
							@endcan

							@can('category')
							<div class="menu-item">
								<a class="menu-link {{ checkActiveSideBar(['categories']) ? 'menu-item active' : '' }}" href="{{ route('categories.index') }}">
									<span class="menu-icon">
										<i class="bi bi-house fs-3"></i>
									</span>
									<span class="menu-title">{{trans_choice('content.category', 2)}}</span>
								</a>
							</div>
							@endcan

							@can('sub_category')
							<div class="menu-item">
								<a class="menu-link {{ checkActiveSideBar(['sub_categories']) ? 'menu-item active' : '' }}" href="{{ route('sub_categories.index') }}">
									<span class="menu-icon">
										<i class="bi bi-house fs-3"></i>
									</span>
									<span class="menu-title">{{trans_choice('content.sub_category', 2)}}</span>
								</a>
							</div>
							@endcan
						</div>
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Aside menu-->
				<!--begin::SideBar Footer-->
				<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
					<a href="" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-delay-show="8000" title="Check out the complete documentation with over 100 components">
						<span class="btn-label">Docs &amp; Components</span>
						<!--begin::Svg Icon | path: icons/duotone/General/Clipboard.svg-->
						<span class="svg-icon btn-icon svg-icon-2">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
									<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
									<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
									<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
								</g>
							</svg>
						</span>
						<!--end::Svg Icon-->
					</a>
				</div>
				<!--end::SideBar Footer-->