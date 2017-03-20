<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    {!! Form::text('fecha_inicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Contrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_contrato', 'Tipo Contrato:') !!}
    {!! Form::text('tipo_contrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Clausula Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clausula_id', 'Clausula Id:') !!}
    {!! Form::text('clausula_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Plan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plan_id', 'Plan Id:') !!}
    {!! Form::text('plan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiempo Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiempo_pago', 'Tiempo Pago:') !!}
    {!! Form::text('tiempo_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contratos.index') !!}" class="btn btn-default">Cancel</a>
</div>
