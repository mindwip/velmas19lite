@extends('layouts.app')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title">
	<div class="container clearfix">
		<h1>{{ $contract->name }}</h1>
		<span>Revisa bien las condiciones del contrato antes de proceder con la compra.</span>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $contract->name }}</li>
		</ol>
	</div>
</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div id="faqs" class="faqs">
				<h3>{{ $contract->name }}:</h3>

				<p>{{ $contract->description }}</p>

				<div class="divider"></div>
				<div class="col_full nobottommargin">
	
					@foreach($blocks as $block)
						<h4 id="faq-1"><strong>1.</strong> Hijos</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum, vero
							ipsum molestiae minima odio quo voluptate illum excepturi quam cum voluptates
							doloribus quae nisi tempore necessitatibus dolores ducimus enim libero eaque
							explicabo suscipit animi at quaerat aliquid ex expedita perspiciatis? Saepe,
							aperiam, nam unde quas beatae vero vitae nulla.</p>
					@endforeach

					<div class="divider"></div>
					<input type="checkbox" class="form-control mr-2 chkAccept" style="display: inline-block; height: 16px; width: 16px;">
					<a target="_blank" href="{{ route('condiciones-uso') }}" style="color: #8071b9;">He leído y cumplo las condiciones del contrato</a>
					<br>
					<a href="{{ route('contratar', $contract->slug) }}" class="button button-desc button-dark button-rounded mt-2 btnAcceptConditions" style="margin-left: 0;">
						Proceder con el pago
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

@push('scripts')
<script>
$(document).ready(function(){
	$('.btnAcceptConditions').on('click', function(e){
		e.preventDefault();
		if($('.chkAccept').is(':checked')){
			var url = $('.btnAcceptConditions').prop('href');
			window.location.href = url;

		}else{
			$('.alertConditions').remove();
			$('<span style="color: #C55; line-height: 22px;" class="alertConditions">Debes aceptar las condiciones antes de continuar<br></span>').insertBefore('.btnAcceptConditions');
			return false;
		}
	});
});
</script>
@endpush

@endsection
