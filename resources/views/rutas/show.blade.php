@extends('layouts.doc')
	@section('content')
	<h1>{{ $ruta->direccion.', '.$ruta->empleado->nombre.' '.$ruta->empleado->apellido.' '.$ruta->empleado->cedula }}</h1>
	<table class="table table-bordered">
	<thead>
	<th>Nº Contrato</th>
	<th>Titular</th>
	<th>Direccion</th>
	<th>Plan</th>
	<th>Monto a Pagar</th>
	<th>Visitado</th>
	</thead>
	<tbody>
		@foreach($ruta->contratos as $contrato)
		    @if($contrato->estado == 'Activo')
		    <tr>
		    <td> {{ $contrato->numero}} </td>
		    <td>
		        @foreach($contrato->personas as $persona)
		        	@if($persona->parentesco == 'Titular')
		        	{!! $persona->nombre.' '.$persona->apellido.' '.$persona->cedula !!}
		        	@endif
		        @endforeach
		    </td>
		    <td>
		        @foreach($contrato->personas as $persona)
		        	@if($persona->parentesco == 'Titular')
		        	{!! $persona->direccion !!}
		        	@endif
		        @endforeach
		    </td>
		    <td>{!!  $contrato->plan->plan !!}</td>
		    <?php  
		        if($contrato->tiempo_pago == "Quincenal"){
		            $cuota_mensual = $contrato->tiempo_pago = 24;
		        }elseif($contrato->tiempo_pago == "Semanal"){
		            $cuota_mensual = $contrato->tiempo_pago = 12;
		        }else{
		            $cuota_mensual = $contrato->tiempo_pago = 6;
		        }      
		    ?>
		    <td> {{ 'Bs: '.@number_format($cuota_mensual, 2, ',', ' ') }}</td>
		    <td></td>
		    @endif
		@endforeach	
	</tbody>
	</table>
	<table class="table table-bordered">
		<th>
	        NOTA:
	        <br>
	        <p>1. Favor los pagos funerarios en cheques hacerlo a nombre de: Servicios Funerarios y Previsivos Virgen de Coromoto C.A </p>
	        <p>2. La primera cuota se cobrara a los treinta (30) dias de la firma de este convenio.</p>
	        <p>3. Se cobrara un recargo en caso de cheque devuelto.</p>
	        <p>4. Este convenio no tendra validez si presenta enmienda o datos falsos.
	    </th>
	    <th>
	   		<p class="text-center">Aprobado Por</p>
	        <p>Servicios Funerarios y </p>
	        <p>Previsivos Virgen de </p>
	        <p>Coromoto C.A </p>
	        <p>______________________</p>
	    </th>    
    </table>
@endsection
