@extends('layouts.app')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>Carrito</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>                        
            <li class="breadcrumb-item active" aria-current="page">Carrito</li>
        </ol>
    </div>
</section>
<!-- #page-title end -->
   
<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="table-responsive">
                <table class="table cart">
                    <thead>
                        <tr>
                            <th class="cart-product-remove">&nbsp;</th>                                           
                            <th class="cart-product-name">Contrato</th>
                            <th class="cart-product-price">Precio</th>                                           
                            <th class="cart-product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    	@php
                    	$total = 0;
                    	@endphp

						@foreach($contracts as $row)
							@php
                    		$subtotal = 0;	
                    		@endphp

	                        <tr class="cart_item">
	                            <td class="cart-product-remove">
	                                <a href="{{ route('delete-contract', $row->id) }}" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
	                            </td>
	                            <td class="cart-product-name">
	                                <a href="{{ route('formulario', $row->slug) }}">{{ $row->name }}</a>
	                            </td>

	                            <td class="cart-product-price">
	                                <span class="amount">{{ $row->price }}COL$</span>
	                            </td>        
	                            <td class="cart-product-subtotal">
	                                <span class="amount">{{ $row->price }}COL$</span>
	                            </td>
	                        </tr>

	                        @php
                    		$total = $total + $row->price;
                    		@endphp
                        @endforeach
                                               
                        <tr class="cart_item">
                            <td colspan="6">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-4 nopadding">                                                        
                                    </div>
                                    <div class="col-lg-8 col-8 nopadding">
                                        <a href="{{ route('carrito') }}" class="button button-3d nomargin fright">Actualizar Carrito</a>
                                        <a href="{{ route('checkout') }}" class="button button-3d notopmargin fright">Proceder con el pago</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row clearfix">
                <div class="col-lg-6 clearfix">
                   
                </div>        
                <div class="col-lg-6 clearfix">
                    <h4>Total Carrito</h4>

                    <div class="table-responsive">
                        <table class="table cart">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Subtotal</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount">{{ $total }}COL$</span>
                                    </td>
                                </tr>                                               
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Total</strong>
                                    </td>        
                                    <td class="cart-product-name">
                                        <span class="amount color lead"><strong>{{ $total }}COL$</strong></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #content end --> 

@endsection
