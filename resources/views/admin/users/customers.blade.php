@extends ('admin.partials.layout')

@section('content')

<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="alert alert-light alert-elevate" role="alert">
		<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
		<div class="alert-text">
			Creación, edición y eliminación de Clientes
		</div>
	</div>

	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon-pages">
					<i class="kt-font-brand flaticon-users-1"></i>
				</span>
				<h3 class="kt-portlet__head-title-pages">
					Clientes
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						&nbsp;
						<a href="{{ route('users.create-customer') }}" class="btn btn-primary btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Nuevo Cliente
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="kt-portlet__body">
			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable"
				id="kt_table_4">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo de contacto</th>
						<!-- <th>Rol Usuario</th>-->
						<th>Estado</th> 
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<!-- <tr>
						<td>Elsa Sailor</td>
						<td>nsailor0@livejournal.com</td>
						<td>1</td>
						<td>1</td>
						<td nowrap></td>
					</tr> -->
				</tbody>
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>

@push('scripts')
<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo1/pages/crud/datatables/advanced/column-rendering.js') }}" type="text/javascript"></script>
@endpush

@endsection