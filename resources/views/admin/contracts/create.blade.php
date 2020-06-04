@extends ('admin.partials.layout')

@section('content')

<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Portlet-->
			<!--begin::Form-->
			<form class="kt-form" method="post" action="{{ route('contracts.store') }}" accept-charset="utf-8" role="form">
				{{ csrf_field() }}

				<div class="kt-portlet__body">
					<div class="kt-form__section kt-form__section--first">
						<div class="form-group row">
							<label for="name" class="col-lg-2 col-form-label">Nombre del Contrato:</label>
							<div class="col-lg-4">
								<input type="text" name="name" class="form-control"
									placeholder="Nombre del contrato" maxlength="191" value="{{ old('name') }}" required>
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
									placeholder="Precio" maxlength="4" value="{{ old('price') }}">

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
										<option value="{{ $cat->id }}">{{ $cat->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="description" class="col-lg-2 col-form-label">Descripción:</label>
							<div class="col-lg-10">
								<textarea class="form-control" name="description">{{ old('description') }}</textarea>
							</div>
						</div>

						<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

						@include('admin.contracts.create-blocks')
					</div>
				</div>

				<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-2">
								<input type="submit" name="submit_save" class="btn btn-success" value="Guardar">
								<button type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
			<!--end::Form-->
		</div>
	</div>

	{{-- <div class="row">
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
								<th>Descripción</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Presentación</td>
								<td>1</td>
								<td nowrap></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Cabecera</td>
								<td>1</td>
								<td nowrap></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Cuerpo</td>
								<td>2</td>
								<td nowrap></td>
							</tr>
							<tr>
								<td>4</td>
								<td>Pie</td>
								<td>1</td>
								<td nowrap></td>
							</tr>
							<tr>
								<td>5</td>
								<td>Cláusulas</td>
								<td>1</td>
								<td nowrap></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div> --}}
</div>

@push('scripts')
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo1/pages/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
@endpush

@endsection
