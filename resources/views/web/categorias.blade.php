@extends('layouts.app')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title">
	<div class="container clearfix">
		<h1>Contratos {{ $category->name }}</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
		</ol>
	</div>
</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row grid-container" data-layout="masonry" style="overflow: visible">

				@foreach($contracts as $contract)
	                <div class="col-lg-3 mb-3">
	                    <div class="flip-card top-to-bottom">
	                        <div class="flip-card-front bg-info dark" data-height-xl="200">
	                            <div class="flip-card-inner">
	                                <div class="card nobg noborder text-center">
	                                    <div class="card-body">
	                                        <i class="icon-select h1"></i>
	                                        <h3 class="card-title">{{ $contract->name }}</h3>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="flip-card-back" data-height-xl="200">
	                            <div class="flip-card-inner">
	                                <p class="mb-2 text-white">{{ $contract->description }}</p>
	                                <button type="button" class="btn btn-outline-light mt-2">
	                                    <a href="{{ route('formulario', $contract->slug) }}">Contratar</a>
	                                </button>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            @endforeach

			</div>
		</div>
	</div>
</section>

@endsection<div class="row grid-container" data-layout="masonry" style="overflow: visible">