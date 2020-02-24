<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
	<!-- begin:: Page -->
	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="/">
				<img alt="Logo" src="{!! asset('assets/media/logos/logo-light.png') !!}" width="100" height="" />
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span>
			</button>
			
			<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
			
			<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i>
			</button>
		</div>
	</div>
	<!-- end:: Header Mobile -->
	
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
			
			<div class="kt-aside kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
				id="kt_aside">

				<!-- begin:: Aside -->
				<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
					<div class="kt-aside__brand-logo">
						<a href="index.html">
							<img alt="Logo" src="{!! asset('assets/media/logos/logo-light.png') !!}" width="100" />
						</a>
					</div>
					<div class="kt-aside__brand-tools">
						<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
							<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
									class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path
											d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero"
											transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
										<path
											d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
											transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
									</g>
								</svg></span>
							<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
									class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path
											d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" />
										<path
											d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
											transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
									</g>
								</svg></span>
						</button>
					</div>
				</div>
				<!-- end:: Aside -->

				<!-- begin:: Aside Menu -->
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
						data-ktmenu-dropdown-timeout="500">
						<ul class="kt-menu__nav ">
							<li class="kt-menu__item @if($opActive == 'admin') kt-menu__item--active @endif" aria-haspopup="true">
								<a href="{{ route('admin') }}" class="kt-menu__link ">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon id="Bound" points="0 0 24 0 24 24 0 24" />
												<path
													d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
													id="Shape" fill="#000000" fill-rule="nonzero" />
												<path
													d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
													id="Path" fill="#000000" opacity="0.3" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">Inicio</span>
								</a>
							</li>
							
							<li class="kt-menu__section ">
								<h4 class="kt-menu__section-text">Gestión de Usuarios</h4>
								<i class="kt-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu @if($opActive == 'usuarios') kt-menu__item--active @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
								<a href="{{ route('users.index') }}" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
												<path
													d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
													id="Combined-Shape" fill="#000000" fill-rule="nonzero"
													opacity="0.3" />
												<path
													d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
													id="Combined-Shape" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">
										Usuarios
									</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu @if($opActive == 'clientes') kt-menu__item--active @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
								<a href="{{ route('users.customers') }}" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path
													d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
													fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path
													d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
													fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">
										Clientes
									</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li>
							
							<li class="kt-menu__section ">
								<h4 class="kt-menu__section-text">Gestionar Formularios</h4>
								<i class="kt-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu @if($opActive == 'formularios') kt-menu__item--active @endif" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="{{ route('contracts.index') }}" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect id="bound" x="0" y="0" width="24" height="24" />
												<path
													d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
													id="Combined-Shape" fill="#000000" opacity="0.3" />
												<path
													d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
													id="Combined-Shape" fill="#000000" />
												<rect id="Rectangle-152" fill="#000000" opacity="0.3" x="10" y="9"
													width="7" height="2" rx="1" />
												<rect id="Rectangle-152-Copy-2" fill="#000000" opacity="0.3" x="7"
													y="9" width="2" height="2" rx="1" />
												<rect id="Rectangle-152-Copy-3" fill="#000000" opacity="0.3" x="7"
													y="13" width="2" height="2" rx="1" />
												<rect id="Rectangle-152-Copy" fill="#000000" opacity="0.3" x="10"
													y="13" width="7" height="2" rx="1" />
												<rect id="Rectangle-152-Copy-5" fill="#000000" opacity="0.3" x="7"
													y="17" width="2" height="2" rx="1" />
												<rect id="Rectangle-152-Copy-4" fill="#000000" opacity="0.3" x="10"
													y="17" width="7" height="2" rx="1" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">
										Formularios
									</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu @if($opActive == 'formularios_crear') kt-menu__item--active @endif" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="{{ route('contracts.create') }}" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z"
													fill="#000000" />
												<path
													d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z"
													fill="#000000" opacity="0.3" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">
										Crear Formularios
									</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu @if($opActive == 'revision') kt-menu__item--active @endif" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="{{ route('user_contracts.index') }}" class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path
													d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
													fill="#000000" opacity="0.3" />
												<path
													d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
													fill="#000000" />
												<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2"
													rx="1" />
												<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2"
													rx="1" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">Contratos a revisar</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li>
							<li class="kt-menu__section ">
								<h4 class="kt-menu__section-text">Gestión de Pagos</h4>
								<i class="kt-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu @if($opActive == 'pagos') kt-menu__item--active @endif" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover">
								<a href="{{ route('payments.index') }}" class="kt-menu__link kt-menu__toggle">
									<span
										class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect id="bound" x="0" y="0" width="24" height="24" />
												<path
													d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
													id="Combined-Shape" fill="#000000" opacity="0.3" />
												<path
													d="M8.63657261,16.4632487 C7.65328954,15.8436137 7,14.7480988 7,13.5 C7,11.5670034 8.56700338,10 10.5,10 C12.263236,10 13.7219407,11.3038529 13.9645556,13 L15,13 C16.1045695,13 17,13.8954305 17,15 C17,16.1045695 16.1045695,17 15,17 L10,17 C9.47310652,17 8.99380073,16.7962529 8.63657261,16.4632487 Z"
													id="Combined-Shape" fill="#000000" />
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">Pagos</span>
									<i class="kt-menu__ver-arrow la la-angle-right"></i>
								</a>
							</li>
							<li class="kt-menu__section ">
								<a href="{{ route('logout') }}" class="kt-menu__link kt-menu__toggle">
									<button type="button" class="btn btn-primary menu">Cerrar Sesión</button>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- end:: Aside Menu -->
			</div>
			<!-- end:: Aside -->

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
					<!-- begin:: Header Menu -->
					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
							class="la la-close"></i></button>
					<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						<div id="kt_header_menu"
							class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
						</div>
					</div>
					<!-- end:: Header Menu -->
					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">
						<!--begin: Notifications -->
						<!--end: Notifications -->
						<!--begin: User Bar -->
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
								<div class="kt-header__topbar-user">
									<span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
									<span class="kt-header__topbar-username kt-hidden-mobile">Admin</span>
									<img class="kt-hidden" alt="Pic"
										src="{!! asset('assets/media/users/300_25.jpg') !!}" />

									<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
									<span
										class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">A</span>
								</div>
							</div>
							<div
								class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
								<!--begin: Head -->
								<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(./assets/media/misc/bg-1.jpg)">
									<div class="kt-user-card__avatar">
										<img class="kt-hidden" alt="Pic"
											src="{!! asset('assets/media/users/300_25.jpg') !!}" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">Admin</span>
									</div>
									<div class="kt-user-card__name">
										Administrador
									</div>
								</div>
								<!--end: Head -->
								<!--begin: Navigation -->
								<div class="kt-notification">
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon">
											<i class="flaticon2-calendar-3 kt-font-success"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">
												Mi Perfil
											</div>
											<div class="kt-notification__item-time">
												Ver mi perfil
											</div>
										</div>
									</a>

									<div class="kt-notification__custom kt-space-between">
										<a href="{{ route('logout') }}" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Cerrar sesión</a>
									</div>
								</div>
								<!--end: Navigation -->
							</div>
						</div>
						<!--end: User Bar -->
					</div>
					<!-- end:: Header Topbar -->
				</div>
				<!-- end:: Header -->
				
				<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
					<!-- begin:: Content Head -->
					<div class="kt-subheader kt-grid__item" id="kt_subheader">
						<div class="kt-subheader__main">
							<h3 class="kt-subheader__title">{{ ucfirst($op) }}</h3>
							<span class="kt-subheader__separator kt-subheader__separator--v"></span>
							<span class="kt-subheader__desc">{{ ucfirst($subop) }}</span>

							<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
								<input type="text" class="form-control" placeholder="Search order..."
									id="generalSearch">
								<span class="kt-input-icon__icon kt-input-icon__icon--right">
									<span><i class="flaticon2-search-1"></i></span>
								</span>
							</div>
						</div>
					</div>
					<!-- end:: Content Head -->

					<!-- Warnings: -->
					@if(session('msg'))
						<div style="padding: 0 10px;">
						    <div class="alert alert-success" role="alert">
						        {{ session('msg') }}
						    </div>
						</div>
					@endif
					@if(session('alert'))
						<div style="padding: 0 10px;">
						    <div class="alert alert-danger" role="alert">
						        {{ session('alert') }}
						    </div>
						</div>
					@endif

					<!-- begin:: Dynamic Content -->
				
				
				
		
	
