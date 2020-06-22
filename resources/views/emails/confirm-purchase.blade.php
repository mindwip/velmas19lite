/@include('emails.partials.header')

<p style="line-height: 130%;">
	Hola {{ $usuario->name }} {{ $usuario->surname }}, te confirmamos la compra en Velmas 19 Lite
</p>
<br>

<p style="line-height: 130%;">
	@php
	$total = 0;
	@endphp

	@foreach($contracts as $row)
		@php
		$subtotal = 0;	
		@endphp

        - {{ $row->name }}, {{ $row->price }}COP$ <br>

        @php
		$total = $total + $row->price;
		@endphp
    @endforeach
</p>

<p style="line-height: 130%;">
	<b>Importe total:</b> {{ $total }}COP$
</p>

@include('emails.partials.footer')