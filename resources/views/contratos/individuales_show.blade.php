@extends('layouts.app')
@section('title','Contratos Individuales')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
     		<!--de la tabla contrato -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('contrato', 'Datos del contrato') !!}
            </div>
			

			<!-- Created At Field -->
			<div class="form-group col-sm-3">
			    {!! Form::label('fecha_gestion', 'Fecha de Gestion:') !!}
			    <p>{!! $contrato->created_at !!}</p>
			</div>

			<!-- Fecha Inicio Field -->
			<div class="form-group col-sm-3">
			    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
			    <p>{!! $contrato->fecha_inicio !!}</p>
			</div>

			<!-- Tipo Contrato Field -->
			<div class="form-group col-sm-3">
			    {!! Form::label('tipo_contrato', 'Tipo de Contrato:') !!}
			    <p>{!! $contrato->tipo_contrato !!}</p>
			</div>

			<!-- estado Contrato Field -->
			<div class="form-group col-sm-3">
			    {!! Form::label('estado', 'Estado del Contrato:') !!}
			    <p>{!! $contrato->estado !!}</p>
			</div>

			<!--de la tabla planes -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('plan', 'Datos del plan') !!}
            </div>
            <!-- plan Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('plan', 'Plan:') !!}
                <p> 
                    {!! $contrato->plan->plan !!}
                </p>
            </div>
			
			<!-- plan monto -->
            <div class="form-group col-sm-4">
                {!! Form::label('plan', 'Monto:') !!}
                <p> 
                    {!! $contrato->plan->monto !!}
                </p>
            </div>

			<!-- Tiempo Pago Field -->
			<div class="form-group col-sm-4">
			    {!! Form::label('tiempo_pago', 'Tiempo Pago:') !!}
			    <p>{!! $contrato->tiempo_pago !!}</p>
			</div>
        	<!--de la tabla persona -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('titular', 'Datos del titular') !!}
            </div>

            <!-- Nombre Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('titular', 'Titular:') !!}
                <p> 
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->nombre.' '.$persona->apellido.' C.I: '.$persona->cedula !!}
                @endif 
            	@endforeach
            	</p>
            </div>

            <!-- Sexo Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('sexo', 'Sexo:') !!}
                <p> 
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->sexo !!}
                @endif 
            	@endforeach
            	</p>
            </div>
   
            <!-- Fecha Nac Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('fecha_nac', 'Fecha de Nacimiento:') !!}
                <p> 
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->fecha_nac !!}
                @endif 
            	@endforeach
            	</p>
            </div>

            <!-- telefono Nac Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('telefono', 'Telefono:') !!}
                <p> 
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->telefono !!}
                @endif 
            	@endforeach
            	</p>
            </div>

            <!-- Estado Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('estado_id', 'Estado:') !!}
                <p> 
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->municipio->estado->estado !!}
                @endif 
            	@endforeach
            	</p>
            </div>

            <!-- Municipio Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('municipio_id', 'Municipio:') !!}
                <p> 
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->municipio->municipio !!}
                @endif 
            	@endforeach
            	</p>
            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-12">
                <p> 
                {!! Form::label('direccion', 'Direccion:') !!}
                @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->direccion !!}
                @endif 
            	@endforeach
            	</p>
            </div>	
		</div>
	</div>
</div>		
<div class="form-group">
	<a href="{!! route('contratos.individuales') !!}" class="btn btn-default">Volver</a>
</div>
@endsection
