<table class="table table-responsive" id="pagos-table">
    <thead>
        <th>Monto</th>
        <th>Numero Cuota</th>
        <th>Tipo Pago</th>
        <th>Contrato Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pagos as $pago)
        <tr>
            <td>{!! $pago->monto !!}</td>
            <td>{!! $pago->numero_cuota !!}</td>
            <td>{!! $pago->tipo_pago !!}</td>
            <td>{!! $pago->contrato_id !!}</td>
            <td>
                {!! Form::open(['route' => ['pagos.destroy', $pago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pagos.show', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pagos.edit', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
