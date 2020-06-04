@extends ('admin.partials.layout')

@section('content')

<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Portlet-->
			<!--begin::Form-->
			<form class="kt-form" method="post" action="{{ route('contracts.update') }}" accept-charset="utf-8" role="form">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $contract->id }}">
	
				<div class="kt-portlet__body">
					<div class="kt-form__section kt-form__section--first">
						<div class="form-group row">
							<label for="name" class="col-lg-2 col-form-label">Nombre del Contrato:</label>
							<div class="col-lg-4">
								<input type="text" name="name" class="form-control"
									placeholder="Nombre del contrato" maxlength="191" value="{{ old('name', $contract->name) }}" required>
								<span class="form-text text-muted">Introduzca el nombre del contrato (tipo)</span>

								@if($errors->has('name'))
	                                <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('name') }}</strong>
	                                </span>
	                            @endif
							</div>

							<label for="price" class="col-lg-2 col-form-label">Precio:</label>
							<div class="col-lg-4">
								<input type="text" name="price" class="form-control text-right"
									placeholder="Precio" maxlength="4" value="{{ old('price', $contract->price) }}">

								@if($errors->has('price'))
	                                <span class="invalid-feedback" role="alert">
	                                  <strong>{{ $errors->first('price') }}</strong>
	                                </span>
	                            @endif
							</div>
						</div>

						<div class="form-group row">
							<label for="category_id" class="col-lg-2 col-form-label">Categoría:</label>
							<div class="col-lg-4">
								<select name="category_id" class="form-control" required>
									<option value="">Selecciona categoría</option>

									@foreach($categories as $cat)
										@php
										$selected = $cat->id == $contract->category_id? 'selected':'';
										@endphp
										<option value="{{ $cat->id }}" {{ $selected }}>{{ $cat->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-lg-2 col-form-label">Descripción:</label>
							<div class="col-lg-10">
								<textarea class="form-control" name="description">{{ old('description', $contract->description) }}</textarea>
							</div>
						</div>
					</div>
				</div>

				@include('admin.contracts.create-blocks')

				<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-2">
								<input type="submit" name="submit_update" class="btn btn-success" value="Guardar">
								<button type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
	<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

	<!-- Bloques del formulario -->
	<div class="row">
		<div class="col-lg-12">
			<div class="kt-portlet" id="kt_portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title-pages">
							Bloques del formulario
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body">
					<!--begin: Datatable -->
					<table
						class="table table-striped- table-bordered table-hover table-checkable"
						id="kt_table_5">
						<thead>
							<tr>
								<th>Posición</th>
								<th>Alias</th>
								<th>Descripción</th>
								<th>Estado</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>

							@foreach($blocks as $row)
								<tr>
									<td>{{ $row->position }}</td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->father }}</td>
									<td>
										@if($row->state == 1)
											<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Activo</span>
										@else
											<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Inactivo</span>
										@endif
									</td>
									<td nowrap class="text-right">
										<a href="{{ route('contracts.edit-block', $row->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Bloque"><i class="la la-edit"></i></a>

										<a href="{{ route('contracts.block-delete', $row->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Contrato" data-msg="¿Estás seguro de eliminar este bloque del contrato?"><i class="la la-trash"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>

@push('scripts')
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo1/pages/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
@endpush

@endsection