<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $empresa->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $empresa->nombre !!}</p>
</div>

<!-- Municipio Id Field -->
<div class="form-group">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
    <p>{!! $empresa->municipio_id !!}</p>
</div>

<!-- Contrato Id Field -->
<div class="form-group">
    {!! Form::label('contrato_id', 'Contrato Id:') !!}
    <p>{!! $empresa->contrato_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $empresa->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $empresa->updated_at !!}</p>
</div>

