<table class="table table-responsive" id="rutas-table">
    <thead>
        <th>Direccion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($rutas as $ruta)
        <tr>
            <td>{!! $ruta->direccion !!}</td>
            <td>
                {!! Form::open(['route' => ['rutas.destroy', $ruta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rutas.show', [$ruta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rutas.edit', [$ruta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
