<!--de la tabla persona -->
    <div class="form-group col-sm-12">
        <hr>
        <br>
        {!! Form::label('titular', 'Datos del titular') !!}
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo']) !!}
    </div>

    <!-- Apellido Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('apellido', 'Apellido:') !!}
        {!! Form::text('apellido', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Apellido Completo']) !!}
    </div>

    <!-- Cedula Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('cedula', 'Cedula:') !!}
        {!! Form::text('cedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}', 'placeholder' => 'Solo Numeros']) !!}
    </div>

    <!-- Sexo Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('sexo', 'Masculino:') !!}
        
        <input class="form-control radio" type="radio" name="sexo" value="Masculino" @if($persona->sexo == "Masculino") 
        {{  'checked'  }} @endif >
    </div>
    <div class="form-group col-sm-3">    
        {!! Form::label('sexo', 'Femenino:') !!} 
        <input class="form-control radio" type="radio" name="sexo" value="Femenino" @if($persona->sexo == "Femenino") 
        {{  'checked'  }} @endif > 
    </div>

    <!-- Fecha Nac Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_nac', 'Fecha de Nacimiento:') !!}
        {!! Form::text('fecha_nac', null, ['class' => 'form-control','id' => 'fecha_nacimiento','placeholder' => 'DD/MM/AAAA']) !!}
    </div>

    <!-- telefono Nac Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('telefono', 'Telefono:') !!}
        {!! Form::text('telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}','placeholder' => 'Solo Numeros']) !!}
    </div>

    @if ($persona->parentesco == 'Titular')
    <!-- Estado Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('estado_id', 'Estado:') !!}
        <select class="form-control" name="estado_id" id="estado_id">
            @foreach($estados as $estado)
                @if($estado->id == $persona->municipio->estado->id)
                <option selected value="{{ $estado->id }}">
                     {{ $estado->estado }}   
                </option>
                @else
                <option value="{{ $estado->id }}">
                     {{ $estado->estado }}   
                </option>    
                @endif 
            @endforeach
        </select>
    </div>
    <!-- Municipio Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('municipio_id', 'Municipio:') !!}
        <select class="form-control" name="municipio_id" id ="municipio_id">
            @foreach($municipios as $municipio)
                 @if($municipio->id == $persona->municipio->id)
                <option selected value="{{ $municipio->id }}">
                     {{ $municipio->municipio }}   
                </option>
                @else
                <option value="{{ $municipio->id }}">
                     {{ $municipio->municipio }}   
                </option>    
                @endif 
            @endforeach
        </select>
    </div>
    @else 
       <!-- estado_id field -->
        {!! Form::hidden('estado_id', null, ['class' => 'form-control','placeholder'=>'estado_id']) !!}
        <!-- municipio_id field -->
        {!! Form::hidden('municipio_id', null, ['class' => 'form-control','placeholder'=>'municipio_id']) !!}
    @endif
    
    <!-- Direccion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('direccion', 'Direccion:') !!}
        {!! Form::textarea('direccion', null, ['class' => 'form-control','placeholder'=>'Parroquia,  Avenida, Casa.']) !!}
    </div>
    <!-- observacion -->
    <div class="form-group col-sm-12">
        {!! Form::label('observacion', 'Observacion:') !!}
        {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
    </div>
    @if ($persona->parentesco == 'Titular')
    <!-- parentesco -->
        {!! Form::hidden('parentesco', null, ['class' => 'form-control','placeholder'=>'Parentesco']) !!}
    @else    
    <!-- parentesco Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('parentesco', 'Parentesco con el titular:') !!}
            <select class="form-control" name="parentesco">
                <option value="Madre" @if($persona->parentesco == "Madre") 
        {{  'selected'  }} @endif >Madre</option>
                <option value="Padre"@if($persona->parentesco == "Padre") 
        {{  'selected'  }} @endif >Padre</option>
                <option value="Hijo" @if($persona->parentesco == "Hijo") 
        {{  'selected'  }} @endif > Hijo</option>
                <option value="Hermano"@if($persona->parentesco == "Hermano") 
        {{  'selected'  }} @endif >Hermano</option>
                <option value="Conyuge"@if($persona->parentesco == "Conyuge") 
        {{  'selected'  }} @endif >Conyuge</option>
            </select>
        </div>
    @endif
    
    <!-- contrato -->
        {!! Form::hidden('contrato_id', null, ['class' => 'form-control','placeholder'=>'Contrato.']) !!}
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
</div>
