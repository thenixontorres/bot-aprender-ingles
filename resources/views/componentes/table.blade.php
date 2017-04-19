<table class="table table-responsive" id="componentes-table">
    <thead>
        <th>Componete</th>
        <th>Plan Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($componentes as $componente)
        <tr>
            <td>{!! $componente->componete !!}</td>
            <td>{!! $componente->plan_id !!}</td>
            <td>
                {!! Form::open(['route' => ['componentes.destroy', $componente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('componentes.show', [$componente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('componentes.edit', [$componente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
