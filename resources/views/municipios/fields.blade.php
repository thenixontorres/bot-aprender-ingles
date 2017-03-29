<!-- Municipio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio', 'Municipio:') !!}
    {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('estado_id', 'Estado:') !!}
        <select class="form-control" name="estado_id">
            @foreach($estados as $estado)
                <option value="{{ $estado->id }}">
                     {{ $estado->estado }}   
                </option>    
            @endforeach
        </select>
    </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('municipios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
