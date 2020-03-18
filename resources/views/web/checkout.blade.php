@extends('layouts.app')

@section('content')

<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1>Checkout</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>                        
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </div>
</section>
<!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

        	@guest
	            <div class="col_half">
	                <div class="card">
	                    <div class="card-body">
	                        Debes registrarte para poder realizar el pago <a href="#modal-login" data-lightbox="inline">Login</a>
	                    </div>
	                </div>
	            </div>                       
	            <div class="clear"></div>

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <h3>Datos de acceso</h3>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

                        <form action="{{ route('register') }}" method="post" id="billing-form" name="billing-form" class="nobottommargin">
                        	@csrf
                            <input type="hidden" name="return" value="checkout">

                            <div class="col_half">
                                <label for="name">Nombre:</label>
                                <input type="text" id="billing-form-name" name="name" class="sm-form-control" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col_half col_last">
                                <label for="surname">Apellidos:</label>
                                <input type="text" id="billing-form-lname" name="surname" value="{{ old('surname') }}" class="sm-form-control" />

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="clear"></div>

                            <div class="col_half">
                                <label for="email">Email:</label>
                                <input type="email" id="billing-form-email" name="email" value="{{ old('email') }}" class="sm-form-control" />

                               	@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>    

                          	<div class="col_half col_last">
                          		<label for="city">Ciudad</label>
                          		<input type="text" id="billing-form-city" name="city" value="{{ old('city') }}" class="sm-form-control" />
                               
                               	@error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col_half">
                                <label for="password">Password:</label>
                                <input type="password" id="billing-form-phone" name="password" class="sm-form-control">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col_half col_last">
                                <label for="password_confirmation">Repetir Password:</label>
                                <input type="password" id="billing-form-phone" name="password_confirmation" class="sm-form-control" />
                            </div>

                            <div class="col_full nobottommargin">
                                <input type="submit" class="button button-rounded nomargin" name="submit_password" value="Seguir">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-100 bottommargin"></div>
            @endguest
              
            <div class="row clearfix"> 
                <div class="col-lg-6">
                    <h4>Resumen de la Compra</h4>

                    <div class="table-responsive">
                        <table class="table cart">
                            <thead>
                                <tr>                                                
                                    <th class="cart-product-name">Contrato</th>                                               
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
	                                    <td class="cart-product-name">
	                                        <a target="_blank" href="{{ route('formulario', $row->slug) }}">{{ $row->name }}</a>
	                                    </td>
	                                    <td class="cart-product-subtotal">
	                                        <span class="amount">{{ $row->price }}COL$</span>
	                                    </td>
	                                </tr>   

			                        @php
		                    		$total = $total + $row->price;
		                    		@endphp
		                        @endforeach  

                            </tbody>    
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4>Total</h4>

                    <div class="table-responsive">
                        <table class="table cart">
                            <tbody>                                                                                      
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

                    <div class="accordion clearfix">
                        <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Direct Bank Transfer</div>
                        <div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>

                        <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Cheque Payment</div>
                        <div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</div>

                        <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Paypal</div>
                        <div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>
                    </div>
                    
                    <a href="#" class="button button-3d fright">PAGAR</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->

@endsection