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
							<label for="description" class="col-lg-2 col-form-label">Descripción:</label>
							<div class="col-lg-10">
								<textarea class="form-control" name="description">{{ old('description', $contract->description) }}</textarea>
							</div>
						</div>

						<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>







					</div>
				</div>

				<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg">
				</div>
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
</div>

@push('scripts')
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo1/pages/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>
@endpush

@endsection