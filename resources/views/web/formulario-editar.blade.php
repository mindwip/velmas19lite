@extends('layouts.app')

@section('content')

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
            <div class="row">
                <div class="col-md-3">
                    <h2>Rellenar Formulario</h2>

                    <form action="{{ route('formulario-update') }}" method="post" role="form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user_contract->id }}">

                        @php
                        $i = 1;

                        //Valor de las variables en el contrato del cliente:
                        $values = unserialize($user_contract->variables);

                        //dd($values);
                        $identificadorVariables = [];
                        $identificadorValues = [];
                        $identificadorTextos = [];
                        $arrValuesMultiple = [];

                        //dd($variables);
                        @endphp
                        
                        @if($variables)
                            @foreach($variables as $var)
                                {{-- Buscamos el valor de la variable en el contrato del cliente --}}
                                @php
                                $identificadorVariables[$var->name] = $i;
                                $identificadorValues[$var->name] = $var->values? $var->values:'';
                                $identificadorTextos[$var->name] = $var->texto? $var->texto:'';

                                $valor = '';
                                @endphp

                                @if($values)
                                    @foreach($values as $idx => $val)
                                        @if($idx == $var->id)
                                            @php
                                            $valor = $val;
                                            @endphp    
                                        @endif
                                    @endforeach
                                @endif

                                {{-- dd($var, $identificadorVariables[$var->name], $identificadorValues[$var->name], $valor, $values) --}}

                                <input type="hidden" name="variable_{{ $i }}" value="{{ $var->id }}">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>{{ $var->name }} <b>({{ $i }})</b></label>

                                        <!-- Para booleano -->
                                        @if($var->type == 'b')
                                            <select class="form-control addVariable" data-indice="{{ $i }}" data-tipo="{{ $var->type }}" name="valor_{{ $var->id }}">
                                                <option value="">Selecciona opción</option>
                                                <option value="si" @if($valor == 'si') selected @endif>Si</option>
                                                <option value="no" @if($valor == 'no') selected @endif>No</option>
                                            </select>

                                        <!-- Para respuesta múltiple -->
                                        @elseif($var->type == 'p')
                                            @php
                                            $answers = unserialize($var->values);
                                            $textos = unserialize($var->texto);

                                            /*if($textos && count($textos) > 0){
                                             dd($answers, $textos, $valor);    
                                            }*/
                                            @endphp

                                            @if(count($answers) > 0)
                                                @php
                                                $j = 0;
                                                @endphp

                                                @foreach($answers as $answer)
                                                    @php
                                                    if($answer == $valor){
                                                        $checked = 'checked';

                                                        if(!in_array($valor, $arrValuesMultiple)){
                                                            array_push($arrValuesMultiple, $valor);
                                                        }
                                                    }else{
                                                        $checked = '';
                                                    }
                                                    @endphp

                                                    <div class="pt-2 pb-2">
                                                        <input type="radio" class="addVariable" name="valor_{{ $var->id }}" data-indice="{{ $i }}" data-tipo="{{ $var->type }}" data-texto="{{ $textos[$j] }}" value="{{ $answer }}" {{ $checked }}> {{ $answer }}
                                                    </div>

                                                    @php
                                                    $j++;
                                                    @endphp
                                                @endforeach
                                            @endif

                                        @else
                                            <input type="text" class="form-control addVariable" data-indice="{{ $i }}" data-tipo="{{ $var->type }}" name="valor_{{ $var->id }}" value="{{ $valor }}">
                                        @endif
                                    </div>    
                                </div>  

                                @php
                                $i++;
                                @endphp  
                            @endforeach
                        @endif

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>

                <div class="col-md-9 col_last">
                    <h2>{{ $contract->name }}</h2>

                    @php
                    $content = '';
                    preg_match_all('/\[+[a-zA-Z0-9-]+\]/', $user_contract->content, $matches);
                    $arr = [];

                    //dd($variables, $matches);
                    $i = 0;
                    @endphp

                    {{-- dd($identificadorVariables, $identificadorValues, $identificadorTextos, $matches) --}}
    
                    {{-- Recorremos las coincidencias y creamos array con su customización: --}}
                    @foreach($matches[0] as $match)
                        @php
                        //Quitamos los corchetes:
                        $match1 = $match;
                        $match1 = substr($match1,1);
                        $match1 = substr($match1,0,-1);

                        if($identificadorValues[$match1]){
                            $partes = unserialize($identificadorValues[$match1]);
                            $partes_textos = unserialize($identificadorTextos[$match1]);

                            if($match1 == 'preguntita'){
                                //dd($identificadorValues, $arrValuesMultiple, $partes, $partes_textos, $variables, $matches, $match1);
                            }

                            foreach($partes as $parte){
                                if(in_array($parte, $arrValuesMultiple)){
                                    $html = '<span class="variable" data-var="'.$identificadorVariables[$match1].'">'.$parte.'</span>';

                                    array_push($arr, $html);
                                }
                            }

                            //dd($partes);   

                        }else{
                            $html = '<span class="variable" data-var="'.$identificadorVariables[$match1].'">('.$identificadorVariables[$match1].')'.$match1.'</span>';

                            array_push($arr, $html);    
                        }                       

                        $i++;
                        @endphp
                    @endforeach 

                    @php
                    $content = str_replace($matches[0], $arr, $user_contract->content);
                    @endphp

                    <div class="lead">{!! $content !!}</div>
                </div>
            </div>
		</div>
	</div>
</section>
<!-- #content end -->

@push('scripts')
<script>
$(document).ready(function(){
    $('.addVariable').on('change', function(){
        var valor = $(this).val();
        var indice = $(this).data('indice');
        var tipo = $(this).data('tipo');

        if(tipo == 'p'){
            var texto = $(this).data('texto');
            $('.variable[data-var="'+indice+'"]').html(texto);

        }else{
            $('.variable[data-var="'+indice+'"]').text(valor);    
        }        
    });

    $('.addVariable').each(function(){
        var valor = $(this).val();

        if(valor != ''){
            var indice = $(this).data('indice'); 
            $('.variable[data-var="'+indice+'"]').text(valor);   
        }
    });
});
</script>
@endpush

@endsection