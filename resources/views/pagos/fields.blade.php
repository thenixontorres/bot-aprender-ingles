<!-- Monto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Cuota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_cuota', 'Numero Cuota:') !!}
    {!! Form::text('numero_cuota', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    {!! Form::text('tipo_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Contrato Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contrato_id', 'Contrato Id:') !!}
    {!! Form::text('contrato_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pagos.index') !!}" class="btn btn-default">Cancel</a>
</div>
