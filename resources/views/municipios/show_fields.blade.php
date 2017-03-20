<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $municipio->id !!}</p>
</div>

<!-- Municipio Field -->
<div class="form-group">
    {!! Form::label('municipio', 'Municipio:') !!}
    <p>{!! $municipio->municipio !!}</p>
</div>

<!-- Estado Id Field -->
<div class="form-group">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    <p>{!! $municipio->estado_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $municipio->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $municipio->updated_at !!}</p>
</div>

