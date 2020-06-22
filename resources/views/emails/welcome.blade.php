@include('emails.partials.header')
				
<p>Bienvenido {{ $usuario->name }} {{ $usuario->surname }}</p>
<br>

<p style="line-height: 130%;">
	Te damos la bienvenida Velmasa 19 Lite
</p>	

@include('emails.partials.footer')