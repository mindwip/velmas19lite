<!DOCTYPE html>
<html>
<head>
	<title>Contrato </title>

	<style type="text/css">
	@page{
		margin: 120px 0 120px 0; 
	}
	body{
		font-family: sans-serif;
		margin: 0px;
	}
	</style>
</head>

<body>
	<header>
		<div class="contract">
			<h1>{{ $contract->name }}</h1>
		</div>
	</header>

	<main>
		<div class="content">
			{!! $content !!}			
		</div>
	</main>
</body>