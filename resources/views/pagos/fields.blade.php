    <div class="form-group col-sm-12">
        {!! Form::label('monto', 'Monto:') !!}
        {!! Form::text('monto', null, ['class' => 'form-control','pattern' => '[0-9]{1,30}', 'placeholder' => 'Solo Numeros']) !!}
    </div>

    <!-- Numero Cuota Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('numero_cuota', 'Numero de Cuota:') !!}
        <select class="form-control" name="numero_cuota">
        @for ($i=0; $i < $cuotas; $i++)
            @if($pago->numero_cuota == $i)
            <option selected value="{{ $i+1 }}"> {{ $i+1 }} </option>
            @else
            <option value="{{ $i+1 }}"> {{ $i+1 }} </option>
            @endif
        @endfor 
        </select> 
    </div>

    <!-- Tipo Pago Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('tipo_pago', 'Tipo de Pago:') !!}
        <select class="form-control" name="tipo_pago">
            @if($pago->tipo_pago == "Banco")
            <option selected value="Banco"> Banco </option>
            <option value="Oficina"> Oficina </option>
            @else
            <option value="Banco"> Banco </option>
            <option selected value="Oficina"> Oficina </option>
            @endif
        </select> 
    </div>

    <!--contrato_id field -->
    {!! Form::hidden('contrato_id', null, ['class' => 'form-control']) !!}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
</div>
