<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $clausula->id !!}</p>
</div>

<!-- Clausulas Field -->
<div class="form-group">
    {!! Form::label('clausulas', 'Clausulas:') !!}
    <p>{!! $clausula->clausulas !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $clausula->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $clausula->updated_at !!}</p>
</div>

