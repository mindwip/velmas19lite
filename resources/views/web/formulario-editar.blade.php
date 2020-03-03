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
                        @endphp

                        @foreach($variables as $var)
                            {{-- Buscamos el valor de la variable en el contrato del cliente --}}
                            @php
                            $valor = '';
                            @endphp

                            @foreach($values as $idx => $val)
                                @if($idx == $var->id)
                                    @php
                                    $valor = $val;
                                    @endphp    
                                @endif
                            @endforeach

                            <input type="hidden" name="variable_{{ $i }}" value="{{ $var->id }}">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>{{ $var->name }} <b>({{ $i }})</b></label>
                                    <input type="text" class="form-control addVariable" data-indice="{{ $i }}" name="valor_{{ $var->id }}" value="{{ $valor }}">
                                </div>    
                            </div>  

                            @php
                            $i++;
                            @endphp  
                        @endforeach
                                                            
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>

                <div class="col-md-9 col_last">
                    <h2>{{ $contract->name }}</h2>

                    @php
                    $content = '';
                    $j = 1;
                    preg_match_all('/\[+[a-zA-Z0-9]+\]/', $user_contract->content, $matches);
                    $arr = [];
                    @endphp
    
                    {{-- Recorremos las coincidencias y creamos array con su customización: --}}
                    @foreach($matches[0] as $match)
                        @php
                        $match1 = $match;
                        $match1 = substr($match1,1);
                        $match1 = substr($match1,0,-1);
                        
                        $html = '<span class="variable" data-var="'.$j.'">('.$j.')'.$match1.'</span>';

                        array_push($arr, $html);
                        $j++;
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

        $('.variable[data-var="'+indice+'"]').text(valor);
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