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
	            {!! Form::label('ano', 'Año:') !!}
	            <select class="form-control" name="ano">
	                @while($min <= $max)
	                	<option value="{{ $min }}">{{ $min }}</option>
	                	<?php $min++; ?> 
	                @endwhile		 
	            </select>
	        </div>

	        <!-- filtro Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::label('estatus', 'Estatus:') !!}
	            <select class="form-control" name="estatus">
	                	<option value="pendiente">Pendiente</option>
	                	<option value="cancelado">Cancelado</option>
	                	<option value="todos">Pendientes/Cancelados</option>		 
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
            <h1 class="pull-left">Resultados: @if($mess != null && $ano != null) {{'Mes '.$mess.', Año '.$ano }} @endif</h1>
        </div>
	</div>
	<div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive" id="table">
		    <thead>
		    	<th>Numero/Tipo contrato</th>
		    	<th>Numero de cuota	</th>
		    	<th>Monto</th>
		    	<th>Fecha de Pago</th>
		        <th>Tipo de Pago</th>
		        <th>Estatus</th>
		    </thead>
		    <tbody>
         	@foreach($giros as $giro)
         		<tr>
         		<td>{{ $giro->contrato->numero.'/'.$giro->contrato->tipo_contrato }}</td>
         		<td>{{ $giro->numero_cuota }}</td>
         		<?php $monto = number_format($giro->monto, 2, ',',''); ?>
         		<td>{{ 'Bs: '.$monto }}</td>
         		@if($giro->estatus == 'pendiente')
         		<td>-------</td>
         		@else
         		<td>{{ $giro->updated_at }}</td>
         		@endif
         		@if($giro->estatus == 'pendiente')
 				<td>-------</td>
         		@else
         		<td>{{ $giro->tipo_pago }}</td>
         		@endif
         		<td>{{ $giro->estatus }}</td>
         		</tr>
         	@endforeach
    		</tbody>
			</table>
        </div>
	</div>
	<h4>Total: {{ 'Bs: '.$total}}</h4>
	@endif
</div>
@endsection
