<!-- Componete Field -->
<div class="form-group col-sm-6">
    {!! Form::label('componete', 'Componete:') !!}
    {!! Form::text('componete', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plan_id', 'Plan Id:') !!}
    {!! Form::text('plan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('componentes.index') !!}" class="btn btn-default">Cancel</a>
</div>
