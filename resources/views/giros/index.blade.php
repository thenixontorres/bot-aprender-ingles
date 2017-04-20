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
		        <th>Numero</th>
		        <th>Tipo</th>
		        <th>Titular</th>
		        <th>Direccion</th>
		    </thead>
		    <tbody>
         
    		</tbody>
			</table>
        </div>
	</div>
	@endif
</div>
@endsection
