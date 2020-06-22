@extends ('admin.partials.layout')

@section('content')

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-12">
			<a href="{{ route('contracts.edit-block', $block) }}" class="btn btn-info" style="color: #FFF; margin-left: 15px;"></i> Volver</a>
			<br><br><br>

			<form class="kt-form" method="post" action="{{ route('contracts.update-variable') }}" accept-charset="utf-8" role="form">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $variable->id }}">
				<input type="hidden" name="block_id" value="{{ $block }}">

				<div class="kt-portlet__body">
					<div class="kt-form__section kt-form__section--first">
						<div class="form-group row">
							<label for="" class="col-lg-2 col-form-label">Nombre variable</label>
							<div class="col-lg-4">
								<input type="text" name="" class="form-control"
									placeholder="Nombre de la variable" maxlength="191" value="{{ $variable->name }}" required readonly>
							</div>
						</div>
					</div>
				</div>
				<br>

				@if($variable->type == 'p')
					@php
					$answers = unserialize($variable->values);
	                $textos = unserialize($variable->texto);
					@endphp

					@if(count($answers) > 0)
						<div class="kt-portlet__body">
						<div class="kt-form__section kt-form__section--first">
							<div class="form-group row">
								<label for="name" class="col-lg-12 col-form-label">Valores
									<button class="btnAddAnswer ml-3" title="Añade respuesta">&#43;</button>
								</label>
								
		                        @php
		                        $j = 0;
		                        @endphp

		                        @foreach($answers as $answer)
									<div class="col-lg-4 mt-2 answer answer-{{ $j }}">
										<input type="text" name="values[]" class="form-control" value="{{ $answer }}" required>
									</div>

									<div class="col-lg-7 mt-2 answer-{{ $j }}">
										<textarea class="form-control" name="texto[]">{{ $textos[$j] }}</textarea>
									</div>
									
									<div class="col-lg-1 mt-2 answer-{{ $j }}">
										<button class="btn btn-danger btnDeleteAnswer" title="eliminar respuesta" data-indice="{{ $j }}">
											<i class="la la-trash-o"></i>	
										</button>
									</div>

									@php
		                        	$j++;
		                        	@endphp	
		                        @endforeach

		                    </div>

		                    <div class="form-group row respuestas">

		                    </div>
		                </div>
					@endif
				@endif

				<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-2">
								<input type="submit" name="submit_save" class="btn btn-success" value="Guardar">
							</div>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
	//Añadir respuesta:
    $('.btnAddAnswer').on('click', function(e){
    	e.preventDefault();
    	var n = $('.answer').length + 1;

    	var html = '<div class="col-lg-4 mt-2 answer answer-'+n+'"><input type="text" name="values[]" class="form-control" value="" required></div>';
    	html += '<div class="col-lg-7 mt-2 answer-'+n+'"><textarea class="form-control" name="texto[]" placeholder="texto de la respuesta"></textarea></div>';
    	html += '<div class="col-lg-1 mt-2 answer-'+n+'"><button class="btn btn-danger btnDeleteAnswer" title="eliminar respuesta" data-indice="'+n+'"><i class="la la-trash-o"></i></button></div>';

    	$('.respuestas').append(html);
    });

    //Eliminar respuesta:
    $(document).on('click', '.btnDeleteAnswer', function(e){
    	e.preventDefault();

    	if(confirm('¿Estás seguro de eliminar esta respuesta?')){
    		var indice = $(this).data('indice');

    		$('.answer-'+indice).remove();
        }else{
            return false;
        }
    });
});
</script>
@endpush

@endsection