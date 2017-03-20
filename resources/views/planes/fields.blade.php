<!-- Plan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plan', 'Plan:') !!}
    {!! Form::text('plan', null, ['class' => 'form-control']) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', null, ['class' => 'form-control']) !!}
</div>

<!-- Informacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion', 'Informacion:') !!}
    {!! Form::text('informacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('planes.index') !!}" class="btn btn-default">Cancel</a>
</div>
