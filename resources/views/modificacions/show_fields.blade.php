<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $modificacion->id !!}</p>
</div>

<!-- Id Contrato Field -->
<div class="form-group">
    {!! Form::label('id_contrato', 'Id Contrato:') !!}
    <p>{!! $modificacion->id_contrato !!}</p>
</div>

<!-- Observacion Field -->
<div class="form-group">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $modificacion->observacion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $modificacion->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $modificacion->updated_at !!}</p>
</div>

