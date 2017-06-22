<table class="table table-responsive" id="personas-table">
    <thead>
        <th>Username</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Tipo</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->telefono !!}</td>
            <td>{!! $user->nombre !!}</td>
            <td>{!! $user->apellido !!}</td>
            <td>{!! $user->cedula !!}</td>
            <td>{!! $user->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.userdestroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personas.useredit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
