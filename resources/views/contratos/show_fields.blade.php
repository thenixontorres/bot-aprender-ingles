<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $contrato->id !!}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    <p>{!! $contrato->fecha_inicio !!}</p>
</div>

<!-- Tipo Contrato Field -->
<div class="form-group">
    {!! Form::label('tipo_contrato', 'Tipo Contrato:') !!}
    <p>{!! $contrato->tipo_contrato !!}</p>
</div>

<!-- Clausula Id Field -->
<div class="form-group">
    {!! Form::label('clausula_id', 'Clausula Id:') !!}
    <p>{!! $contrato->clausula_id !!}</p>
</div>

<!-- Plan Id Field -->
<div class="form-group">
    {!! Form::label('plan_id', 'Plan Id:') !!}
    <p>{!! $contrato->plan_id !!}</p>
</div>

<!-- Tiempo Pago Field -->
<div class="form-group">
    {!! Form::label('tiempo_pago', 'Tiempo Pago:') !!}
    <p>{!! $contrato->tiempo_pago !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $contrato->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $contrato->updated_at !!}</p>
</div>

