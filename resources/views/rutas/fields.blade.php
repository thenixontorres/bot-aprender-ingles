
<!-- Direccion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
</div>

<!--cobrador Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('empelado_id', 'Cobrador Responsable:') !!}
    <select class="form-control" name="empleado_id">
        @if(isset($ruta))
        	@foreach($empleados as $empleado)
	            <option @if($ruta->empleado_id == $empleado->id) selected @endif value="{{ $empleado->id }}">
	                 {{ $empleado->nombre.' '.$empleado->nombre.' '.$empleado->cedula }}   
	            </option>    
	        @endforeach
        @else
	        @foreach($empleados as $empleado)
	            <option value="{{ $empleado->id }}">
	                 {{ $empleado->nombre.' '.$empleado->nombre.' '.$empleado->cedula }}   
	            </option>    
	        @endforeach
        @endif
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rutas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
