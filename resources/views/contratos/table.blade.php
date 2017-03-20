<table class="table table-responsive" id="contratos-table">
    <thead>
        <th>Fecha Inicio</th>
        <th>Tipo Contrato</th>
        <th>Clausula Id</th>
        <th>Plan Id</th>
        <th>Tiempo Pago</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contratos as $contrato)
        <tr>
            <td>{!! $contrato->fecha_inicio !!}</td>
            <td>{!! $contrato->tipo_contrato !!}</td>
            <td>{!! $contrato->clausula_id !!}</td>
            <td>{!! $contrato->plan_id !!}</td>
            <td>{!! $contrato->tiempo_pago !!}</td>
            <td>
                {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contratos.show', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contratos.edit', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
