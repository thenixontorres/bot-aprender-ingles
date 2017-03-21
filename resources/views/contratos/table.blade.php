<table class="table table-responsive" id="contratos-table">
    <thead>
        <th>Titular</th>
        <th>Fecha Inicio</th>
        <th>Plan</th>
        <th>Tiempo Pago</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contratos as $contrato)
        <tr>  
            @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    <td>{!! $persona->nombre.' '.$persona->apellido.' '.$persona->cedula !!}</td>
                @endif 
            @endforeach
            
            <td>{!! $contrato->fecha_inicio !!}</td>
            <td>{!! $contrato->plan->plan !!}</td>
            <td>{!! $contrato->tiempo_pago !!}</td>
            <td>{!! $contrato->estado !!}</td>
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
