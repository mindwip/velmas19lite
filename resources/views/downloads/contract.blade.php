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
	header{
		height: 80px;
		left: 0;
		padding: 0 30px 12px 30px;
		position: fixed;
		right: 0;
		top: -110px;	
	}
	.clearfix{
		clear: both;
		display: block;
		float: none;
	}
	main{
		padding: 30px;
	}
	footer{
		bottom: -120px;
		height: 120px;
		left: 0;
		padding: 0 30px 12px 30px;
		position: fixed;
		right: 0;
	}
	</style>
</head>

<body>
	<header>
		<div class="contract">
			<h1>{{ $contract->name }}</h1>
		</div>
	</header>

	<footer>
		
	</footer>

	<main>
		<div class="content">
			{!! $content !!}			
		</div>
	</main>
</body>