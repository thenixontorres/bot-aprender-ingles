<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Recibo</title>
		<style type="text/css">
			body {
				padding: 0px;
				margin: 0px;
				font-size: 11px;
			}

			table {
				width: 100%;
			}

			.text-center {
				text-align: center;
			}
			
			.text-justify {
				text-align: justify;
			}

			table.bordered tr td {
				border: 1px solid black;
				padding-left: 4px; 
			}
		</style>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td class="text-center">
					<img style="min-width: 100%;" src="{{ asset('img/logo-recibo.jpg') }}">
				</td>
			</tr>
		</table>
		<table class="bordered" cellspacing="0">
			<tr>
				<td>Contrato:</td>
				<td>
					{{ $contrato->numero }}
				</td>
				<td>Cedula:</td>
				<td>
					{{ $titular->cedula }}
				</td>
			</tr>
			<tr>
				<td>Cliente:</td>
				<td>
					{{ $titular->nombre.' '.$titular->apellido }}
				</td>
				<td>Telefono:</td>
				<td>
					{{ $titular->telefono }}
				</td>
			</tr>
		</table>
		<table class="bordered" cellspacing="0">
			<tr>
				<td width="35%">Direccion:</td>
				<td width="65%">
					{{ $titular->direccion }}
				</td>
			</tr>
		</table>
		<div style="position: absolute; width: 964.2px; display: block; border: 1px solid black; height: 366.5px; top: 187px;">
			@foreach($contrato->pagos as $pago)
				<div style="position: relative; display: inline-block; width: 156.225px; margin: 0px; padding: 0px; border-spacing: 0px; border-collapse: collapse; padding-left: 2px;">
			        <div style="width: 60px;">
			            <img class="img-responsive" style="width: 60px;" src="{{ asset('img/logo-recibo-inverse.jpg') }}"> 
			        </div>
			        <div style="writing-mode: vertical-lr; transform: rotate(270deg); border-bottom: 1px solid black; width: 366px; margin-left: 80px; height: 71px;">
			        	<?php $monto = number_format($pago->monto, 2, ',', ''); ?>
			            <p class="text-center"> 
			            	{{'Cuota: '.$pago->numero_cuota.'   Monto: '.$monto }} <br>
			            	{{'Contrato: '.$contrato->numero.' Fecha: '.$pago->concepto }}
			            </p>
			        </div>
				</div>
	        @endforeach
		</div>
	</body>
</html>