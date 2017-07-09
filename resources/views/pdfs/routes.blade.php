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

			table {
				font-size: 12px;
			}

			table.bordered tr > td,
			table.bordered tr > th {
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
		<h4>{{ 'Ruta: '.$ruta->direccion }}</h4>
		<h4>{{ 'Cobranza: '.$fecha_actual->format('d/m/Y') }}</h4>
		<h4>{{ 'Cobrador: '.$ruta->empleado->nombre.' '.$ruta->empleado->apellido }}</h4>
		<table class="bordered" cellspacing="0">
			<thead>
				<tr>
					<th>Nº Contrato</th>
					<th>Cedula</th>
					<th>Titular</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Cuotas por cobrar</th>
					<th>Monto</th>
					<th>Visitado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ruta->contratos as $contrato)
				    @if($contrato->estado == 'Activo')
				    	@foreach($contrato->personas as $persona)
				        	@if($persona->parentesco == 'Titular')
					        	<?php  $titular = $persona; ?>
				        	@endif
				        @endforeach
					    <tr>
					    	<td> {{ $contrato->numero}} </td>
						    <td>
						        {{ $titular->cedula }}
						    </td>
					    	<td> {{ $titular->nombre.' '.$titular->apellido }}</td>
						    <td>
						        {{ $titular->direccion }}
						    </td>
						    <td>{{ $titular->telefono }}</td>
						    <!-- cuotas por cobrar -->
						    <?php 
						    	$cuota_pendientes = '';
						    	$monto_cobrar = 0; 
						    ?>
						    @foreach($contrato->pagos as $pago)
						    	@if($pago->concepto < $fecha_actual && $pago->estatus == 'pendiente')
						    		<?php 
						    			$cuota_pendientes = $cuota_pendientes.' '.$pago->numero_cuota; 
						    			$monto_cobrar = $monto_cobrar+$pago->monto;
						    		?>
						    	@endif
						    @endforeach
						   	<td>{{ $cuota_pendientes }}</td>
						   	<td>{{ 'Bs: '.@number_format($monto_cobrar, '2', ',', '') }}</td>
						    <td> </td>
						 </tr>
				    @endif
				@endforeach
			</tbody>
		</table>
	</body>
</html>