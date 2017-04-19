<!-- Estado Field -->
<div class="form-group col-sm-12">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estados.index') !!}" class="btn btn-default">Cancelar</a>
</div>
