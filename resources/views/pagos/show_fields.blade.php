<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pago->id !!}</p>
</div>

<!-- Monto Field -->
<div class="form-group">
    {!! Form::label('monto', 'Monto:') !!}
    <p>{!! $pago->monto !!}</p>
</div>

<!-- Numero Cuota Field -->
<div class="form-group">
    {!! Form::label('numero_cuota', 'Numero Cuota:') !!}
    <p>{!! $pago->numero_cuota !!}</p>
</div>

<!-- Tipo Pago Field -->
<div class="form-group">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    <p>{!! $pago->tipo_pago !!}</p>
</div>

<!-- Contrato Id Field -->
<div class="form-group">
    {!! Form::label('contrato_id', 'Contrato Id:') !!}
    <p>{!! $pago->contrato_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pago->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pago->updated_at !!}</p>
</div>

