<table class="table table-responsive" id="planes-table">
    <thead>
        <th>Plan</th>
        <th>Monto</th>
        <th>Informacion</th>
        <th>Componentes</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($planes as $planes)
        <tr>
            <td>{!! $planes->plan !!}</td>
            <td>{!! $planes->monto !!}</td>
            <td>{!! $planes->informacion !!}</td>
            <td>
            @foreach($planes->componentes as $componente)
                {!! $componente->componente !!} 
                {!! Form::open(['route' => ['componentes.destroy', $componente->id], 'method' => 'delete']) !!}
                <a href="{!! route('componentes.edit', [$componente->id]) !!}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit" ></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Borrar este Componente?')"]) !!}
                {!! Form::close() !!}
            @endforeach
            </td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('planes.edit', [$planes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
