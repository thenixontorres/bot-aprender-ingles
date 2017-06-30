@extends('layouts.doc')
	@section('content')
	
	<div class="col-md-12">
		<img class="img-responsive" style="min-width: 100%" src="{{asset('img/logo-recibo.jpg')}}">
	</div>
	<h4>{{ 'Ruta: '.$ruta->direccion }}</h4>
	<h4>{{ 'Cobranza: '.$fecha_actual->format('d/m/Y') }}</h4>
	<h4>{{ 'Cobrador: '.$ruta->empleado->nombre.' '.$ruta->empleado->apellido }}</h4>
	<table class="table table-bordered">
	<thead>
	<th>Nº Contrato</th>
	<th>Cedula</th>
	<th>Titular</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th>Cuotas por cobrar</th>
	<th>Monto</th>
	<th>Visitado</th>
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
		    	@if($pago->concepto < $fecha_actual && $pago->status == 'pendiente')
		    		<?php 
		    			$cuota_pendientes = $cuota_pendientes+$pago->numero_cuota; 
		    			$monto_cobrar = $monto_cobrar+$pago->monto;
		    		?>
		    	@endif
		    @endforeach
		   	<td>{{ $cuota_pendientes }}</td>
		   	<td>{{ $monto_cobrar }}</td>
		    <td> </td>
		    @endif
		@endforeach	
	</tbody>
	</table>
@endsection
