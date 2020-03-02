@extends ('admin.partials.layout')

@section('content')


<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-3">
			<label class="col-lg-12 col-form-label">Campos variables</label>

			<form class="kt-form" method="post" action="{{ route('contracts.store-variable') }}" accept-charset="utf-8" role="form">
				{{ csrf_field() }}
				<input type="hidden" name="block_id" value="{{ $block->id }}">	

				<div class="row">
					<label for="type" class="col-lg-12 col-form-label">Tipo de dato:</label>	
					<div class="col-lg-12">
						<select class="form-control" name="type" id="tipoTipo" required>
							<option value="">Selecciona tipo</option>
							<option value="n">Numérico</option>
							<option value="t">Texto</option>
							<option value="f">Fecha</option>
						</select>
					</div>

					<label for="name" class="col-lg-12 col-form-label">Nombre:</label>	
					<div class="col-lg-12">
						<input type="text" name="name" id="tipoNombre" class="form-control" required disabled>
					</div>

					<div class="col-lg-6">
						<br>
						<input type="submit" name="submit_save_variable" class="btn btn-success" value="Guardar">
					</div>
				</div>
				<br>

				<div class="row">
					<table class="table table-striped- table-bordered table-hover table-checkable">
						<thead>
							<tr>
								<th>Variable</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($variables as $var)
								<tr>
									<td>{{ $var->name }}</td>
									<td class="text-right">
										<a href="{{ route('contracts.delete-variable', $var->id) }}" class="btn-confirm" data-msg="¿Estás seguro de eliminar esta variable?">
											<i class="la la-trash-o"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</form>
		</div>

		<div class="col-lg-9">
			<div class="row">
				<!--begin::Portlet-->
				<!--begin::Form-->
				<form class="kt-form" method="post" action="{{ route('contracts.update-block') }}" accept-charset="utf-8" role="form">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $block->id }}">

					<div class="kt-portlet__body">
						<div class="kt-form__section kt-form__section--first">
							<div class="form-group row">
								<label for="" class="col-lg-12 col-form-label">Contenido:</label>
								<div class="col-lg-12">
									<textarea class="form-control" id="editor" name="block" placeholder="texto prueba">{{ $block->block }}</textarea>
								</div>

								<div class="col-lg-12 mt-3">
									<p class="text-danger">
										Introduce las variables mediante el siguiente patrón: <b>[nombre_variable]</b>, tomando como 'nombre_variable' cualquiera de los tipos creados que se muestran en la columna de la izquierda.
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<input type="submit" name="submit_save_content" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

<script>
$(document).ready(function(){
    CKEDITOR.replace( 'editor' );
    /*CKEDITOR.on('instanceReady', function(){
    	$('.cke_contents iframe').contents().click(function() {
        	alert('Clicked!');
    	});
	});*/

    $('#tipoTipo').on('change', function(){
    	var option = $(this).val();
    	if(option != ''){
    		$('#tipoNombre').attr('disabled', false);
    	}
    });
});
</script>
@endpush

@endsection
