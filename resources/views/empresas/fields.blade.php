<!-- empresa Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('empresa_nombre', 'Nombre de la empresa:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo de la Empresa']) !!}
            </div>

            <!-- empresa telefono Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('empresa_telefono', 'Telefono:') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}', 'placeholder' => 'Solo Numeros']) !!}
            </div>

            <!-- Estado Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('estado_id', 'Estado:') !!}
        <select class="form-control" name="estado_id" id="estado_id">
            @foreach($estados as $estado)
                @if($estado->id == $empresa->municipio->estado->id)
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
        <select class="form-control" name="municipio_id" id="municipio_id">
            @foreach($municipios as $municipio)
                 @if($municipio->id == $empresa->municipio->id)
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

            <!-- Direccion Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('empresa_direccion', 'Direccion de la empresa:') !!}
                {!! Form::textarea('direccion', null, ['class' => 'form-control','placeholder' => 'Parroquia, Avenida, Casa']) !!}
            </div>
            <!-- contrato -->
        {!! Form::hidden('contrato_id', null, ['class' => 'form-control','placeholder'=>'Contrato.']) !!}
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
</div>
