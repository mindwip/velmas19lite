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
					<a href="{{ route('contratar', $contract->slug) }}" class="button button-desc button-dark button-rounded">
						<div>Proceder con el pago</div><span>He leído y cumplo las condiciones del
							contrato</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
