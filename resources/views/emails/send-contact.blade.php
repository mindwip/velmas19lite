<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title></title>

	<style type="text/css">
	body{
		font-family: sans-serif;
		margin: 0;
		padding: 0;
	}
	#main{
		border-collapse: collapse;
		margin: 30px auto;
		max-width: 600px;
		padding: 10px;
		width: 100%;
	}		
	</style>
</head>

<body>
	<table id="main">
		<thead>
			<tr>
				<th>
					Contacto de {{ $usuario->name }}, {{ $usuario->subject }}
				</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>
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
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>