@include('emails.partials.header')
				
<p>Contacto de {{ $usuario->name }}, {{ $usuario->subject }}</p>
<br>

<p style="line-height: 130%;">
	<b>Usuario:</b> {{ $usuario->name }}<br>
	<b>Email: </b> {{ $usuario->email }}<br>
	<b>Teléfono: </b> {{ $usuario->phone }}<br>
	<b>Servicio: </b> {{ $usuario->service }}
	<br><br>
	<b>Mensaje:</b>
	<br><br>
	{{ $usuario->message }}
</p>	

@include('emails.partials.footer')