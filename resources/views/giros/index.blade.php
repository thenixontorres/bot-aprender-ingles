@extends('layouts.app')
@section('title','Rutas')
@section('content')
<div class="col-md-12 panel">   
	<div class="row">
	        <div class="col-sm-12">
	            <h1 class="pull-left">Buscar Giros</h1>
	        </div>
	</div>
	<div class="row">
	    {!! Form::open(['route' => 'contratos.buscar_giros']) !!}
	        <!-- Mes Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::label('mes', 'Mes:') !!}
	            <select class="form-control" name="mes">
	                @foreach ($meses as $mes)
	                	<option value ="{{ $mes['valor']}}" >{{ $mes['mes']}} </option>
	                @endforeach 
	            </select>
	        </div>

	        <!-- Año Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::label('ano', 'Ano:') !!}
	            <select class="form-control" name="ano">
	                @while($min <= $max)
	                	<option value="{{ $min }}">{{ $min }}</option>
	                	<?php $min++; ?> 
	                @endwhile		 
	            </select>
	        </div>
	   <!-- Submit Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
	        </div>
	    {!! Form::close() !!} 
	</div>
    <hr>
	@if ($giros != null)
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Resultados:</h1>
        </div>
	</div>
	<div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive" id="table">
		    <thead>
		    	<th>Numero de contrato</th>
		        <th>Numero de cuota</th>
		        <th>Tipo de Pago</th>
		        <th>Tipo</th>
		        <th>Titular</th>
		    </thead>
		    <tbody>
         	@foreach($giros as $giro)
         		<tr>
         		<td>{{ $giro->contrato->numero }}</td>
         		<td>{{ $giro->numero_cuota }}</td>
         		<td>{{ $giro->contrato->tiempo_pago }}</td>
         		<td>{{ $giro->contrato->tipo_contrato }}</td>
         		@foreach($giro->contrato->personas as $persona)
	         		@if($persona->parentesco == "Titular")
	         		<td>{{ $persona->nombre.' '.$persona->apellido.' '.$persona->cedula }}</td>
	         		@endif
         		@endforeach
         		</tr>
         	@endforeach
    		</tbody>
			</table>
        </div>
	</div>
	@endif
</div>
@endsection
