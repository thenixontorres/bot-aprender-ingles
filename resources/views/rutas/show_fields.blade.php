@foreach($ruta->contratos as $contrato)
<div class="col-md-3">
    {!! Form::label('numero', 'Numero de contrato:') !!}
    <p> {{ $contrato->numero}}</p>
</div>

<div class="col-md-3">
    {!! Form::label('titular', 'Titular:') !!}
    @foreach($contrato->personas as $persona)
    	@if($persona->parentesco == 'Titular')
    	<p>{!! $persona->nombre.' '.$persona->apellido.' '.$persona->cedula !!}</p>
    	@endif
    @endforeach
</div>

<div class="col-md-3">
    {!! Form::label('direccion', 'Direccion:') !!}
    @foreach($contrato->personas as $persona)
    	@if($persona->parentesco == 'Titular')
    	<p>{!! $persona->direccion !!}</p>
    	@endif
    @endforeach
</div>

<div class="col-md-3">
    {!! Form::label('plan', 'plan:') !!}
    	<p>{!!  $contrato->plan->plan !!}</p>
</div>
@endforeach

