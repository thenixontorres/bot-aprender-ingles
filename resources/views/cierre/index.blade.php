@extends('layouts.app')
@section('title','Cierre')
@section('content')
<div class="col-md-12 panel">   
	<div class="row">
	        <div class="col-sm-12">
	            <h1 class="pull-left">Consultar Cierre</h1>
	        </div>
	</div>
	<div class="row">
	    {!! Form::open(['route' => 'contratos.consultar_cierre']) !!}
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
			<!-- Submit Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
	        </div>
	    {!! Form::close() !!} 
	</div>
    <hr>
	@if (isset($cancelados))
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Pagos cobrados con fecha: {{$mess.'/'.$ano}}</h1>
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
		    	<th>Concepto</th>
		        <th>Tipo de Pago</th>
		    </thead>
		    <tbody>
         	@foreach($cancelados as $cancelado)
         		<tr>
         		<td>{{ $cancelado->contrato->numero.'/'.$cancelado->contrato->tipo_contrato }}</td>
         		<td>{{ $cancelado->numero_cuota }}</td>
         		<?php $monto = number_format($cancelado->monto, 2, ',',''); ?>
         		<td>{{ 'Bs: '.$monto }}</td>
         		<td>{{ $cancelado->updated_at }}</td>
         		<td>{{ $cancelado->concepto }}</td>
         		<td>{{ $cancelado->tipo_pago }}</td>
         		</tr>
         	@endforeach
    		</tbody>
			</table>
        </div>
	</div>
	<h4>Total: {{ 'Bs: '.$total_cancelados}}</h4>
	@endif
	@if (isset($pendientes))
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Pagos por cobrar con fecha: {{$mess.'/'.$ano}}</h1>
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
		    	<th>Concepto</th>
		        <th>Tipo de Pago</th>
		    </thead>
		    <tbody>
         	@foreach($pendientes as $pendiente)
         		<tr>
         		<td>{{ $pendiente->contrato->numero.'/'.$pendiente->contrato->tipo_contrato }}</td>
         		<td>{{ $pendiente->numero_cuota }}</td>
         		<?php $monto = number_format($pendiente->monto, 2, ',',''); ?>
         		<td>{{ 'Bs: '.$monto }}</td>
         		<td>{{ $pendiente->updated_at }}</td>
         		<td>{{ $pendiente->concepto }}</td>
         		<td>{{ $pendiente->tipo_pago }}</td>
         		</tr>
         	@endforeach
    		</tbody>
			</table>
        </div>
	</div>
	<h4>Total: {{ 'Bs: '.$total_pendientes}}</h4>
	@endif
	@if (isset($nuevos))
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Nuevos Contratos con del: {{$mess.'/'.$ano}}</h1>
        </div>
	</div>
	<div class="row">
        <div class="col-sm-12">
	<table class="table table-responsive" id="table">
	    <thead>
	        <th>Numero</th>
	        <th>Fecha Inicio</th>
	        <th>Plan</th>
	        <th>Estado</th>
	    </thead>
	    <tbody>
	    @foreach($nuevos as $nuevo)
	        <tr>  
	            <td>
	                {!! $nuevo->numero !!}
	            </td>
	            <td>{!! $nuevo->fecha_inicio !!}</td>
	            <td>{!! $nuevo->plan->plan !!}</td>
	            <td>{!! $nuevo->estado !!}</td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
        </div>
	</div>
	<h4>Total: {{ $count_nuevos }}</h4>
	@endif
</div>
@endsection
