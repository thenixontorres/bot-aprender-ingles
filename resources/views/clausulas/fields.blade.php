<!-- Clausulas Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Clausulas Field -->
<div class="form-group col-sm-12">
    {!! Form::label('clausulas', 'Clausulas:') !!}
    {!! Form::file('clausulas', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('home') !!}" class="btn btn-default">Cancelar</a>
</div>
