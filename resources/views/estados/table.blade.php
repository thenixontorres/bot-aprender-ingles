<table class="table table-responsive" id="estados-table">
    <thead>
        <th>Estado</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($estados as $estado)
        <tr>
            <td>{!! $estado->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['estados.destroy', $estado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estados.edit', [$estado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
