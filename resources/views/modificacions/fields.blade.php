<!-- Id Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_contrato', 'Id Contrato:') !!}
    {!! Form::text('id_contrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('modificacions.index') !!}" class="btn btn-default">Cancel</a>
</div>
