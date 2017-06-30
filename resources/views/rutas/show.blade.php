@extends('layouts.doc')
	@section('content')
	
	<div class="col-md-12">
		<img class="img-responsive" style="min-width: 100%" src="{{asset('img/logo-recibo.jpg')}}">
	</div>
	<h4>{{ 'Ruta: '.$ruta->direccion.', '.$ruta->empleado->nombre.' '.$ruta->empleado->apellido.' '.$ruta->empleado->cedula }}</h4>
	<h4>{{ 'Cobrador: '.$ruta->empleado->nombre.' '.$ruta->empleado->apellido }}</h4>
	<table class="table table-bordered">
	<thead>
	<th>Nº Contrato</th>
	<th>Cedula</th>
	<th>Titular</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th>Cuotas por Cobrar</th>
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
		   	<td>--</td>
		   	<td>--</td>
		    <td>--</td>
		    <td></td>
		    @endif
		@endforeach	
	</tbody>
	</table>
@endsection
