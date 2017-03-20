<table class="table table-responsive" id="planes-table">
    <thead>
        <th>Plan</th>
        <th>Monto</th>
        <th>Informacion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($planes as $planes)
        <tr>
            <td>{!! $planes->plan !!}</td>
            <td>{!! $planes->monto !!}</td>
            <td>{!! $planes->informacion !!}</td>
            <td>
                {!! Form::open(['route' => ['planes.destroy', $planes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('planes.show', [$planes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('planes.edit', [$planes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
