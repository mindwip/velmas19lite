@extends ('admin.partials.layout', array(
	'' => ''
))

@section('content')

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--Begin::Dashboard 1-->
	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-3">

			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--solid-users kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon"><i
								class="flaticon-users"></i></span>
						<h3 class="kt-portlet__head-title">Usuarios</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						Gestionar Usuarios APP
					</div>
				</div>
				<!-- <div class="kt-portlet__body">
					<div class="kt-portlet__content">
						
					</div>
				</div> -->
				<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
					<a href="{{ route('users.index') }}" class="btn btn-font-light btn-outline-hover-light">Gestionar Usuarios</a>
				</div>
			</div>
			<!--end::Portlet-->
		</div>

		<div class="col-xl-3">
			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--solid-forms kt-portletk-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon"><i
								class="flaticon-file-2"></i></span>
						<h3 class="kt-portlet__head-title">Formularios</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						Gestionar Formularios
					</div>
				</div>
				<!-- <div class="kt-portlet__body">
					<div class="kt-portlet__content">
						
					</div>
				</div> -->
				<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
					<a href="formularios.html"
						class="btn btn-font-light btn-outline-hover-light">Gestionar
						Formularios</a>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
		<div class="col-xl-3">
			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--solid-creaforms kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon"><i
								class="flaticon-file-1 "></i></span>
						<h3 class="kt-portlet__head-title">Crear Formularios</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						Crear Formularios
					</div>
				</div>
				<!-- <div class="kt-portlet__body">
					<div class="kt-portlet__content">
						
					</div>
				</div> -->
				<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
					<a href="crear-formularios.html"
						class="btn btn-font-light btn-elevate btn-outline-hover-light">Crear
						Formulario</a>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
		<div class="col-xl-3">
			<!--begin::Portlet-->
			<div class="kt-portlet kt-portlet--solid-pagos kt-portlet--height-fluid">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon"><i
								class="flaticon-piggy-bank"></i></span>
						<h3 class="kt-portlet__head-title">Pagos</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						Resumen de Pagos
					</div>
				</div>
				<!-- <div class="kt-portlet__body">
					<div class="kt-portlet__content">
						
					</div>
				</div> -->
				<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
					<a href="pagos.html"
						class="btn btn-font-light btn-elevate btn-outline-hover-light">Gestionar
						Pagos</a>

				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div>
	<!--End::Section-->

	<!--End::Dashboard 1-->
</div>
<!-- end:: Content -->

@endsection