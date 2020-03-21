@extends('layouts.app')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>Confirmación de pago</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>                        
            <li class="breadcrumb-item active" aria-current="page">Confirmación</li>
        </ol>
    </div>
</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
			<div class="text-center">
				{!! $msg !!}
			</div>	
        </div>
    </div>
</section>

@endsection