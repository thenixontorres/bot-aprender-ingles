@extends('layouts.app')
@section('title','Rutas')
@section('content')
<div class="col-md-12 panel">   
	<div class="row">
	        <div class="col-sm-12">
	            <h1 class="pull-left">Buscar Rutas</h1>
	        </div>
	</div>
	<div class="row">
	    {!! Form::open(['route' => 'contratos.buscar_rutas']) !!}

	        <!-- Estado Id Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::label('estado_id', 'Estado:') !!}
	            <select class="form-control" name="estado_id">
	                @foreach($estados as $estado)
	                    <option value="{{ $estado->id }}">
	                         {{ $estado->estado }}   
	                    </option>
	                @endforeach
	            </select>
	        </div>

	        <!-- Municipio Id Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::label('municipio_id', 'Municipio:') !!}
	            <select class="form-control" name="municipio_id">
	                @foreach($municipios as $municipio)
	                    <option value="{{ $municipio->id }}">
	                         {{ $municipio->municipio }}   
	                    </option>
	                @endforeach
	            </select>
	        </div>
	   <!-- Submit Field -->
	        <div class="form-group col-sm-12">
	            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
	        </div>
	    {!! Form::close() !!} 
	</div>
    <hr>
	@if ($titulares != null)
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
            @foreach($titulares as $titular)
            <tr>  
                <td>
                    {!! $titular->contrato->numero !!}
                </td>
                <td>
                    {!! $titular->contrato->tipo_contrato !!}
                </td>
                <td>
                 {!! $titular->nombre.' '.$titular->apellido.' '.$titular->cedula !!}
                </td>
            <td>{!! $titular->municipio->estado->estado.', '.$titular->municipio->municipio.', '.$titular->direccion !!}</td>
                {!! Form::close() !!}
            </td>
	        </tr>
	    	@endforeach
    		</tbody>
			</table>
        </div>
	</div>
	@endif
</div>
@endsection
