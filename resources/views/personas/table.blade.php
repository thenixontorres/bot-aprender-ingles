<table class="table table-responsive" id="personas-table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Sexo</th>
        <th>Fecha Nac</th>
        <th>Municipio Id</th>
        <th>Direccion</th>
        <th>Contrato</th>
        <th>Tipo Contrato</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->nombre !!}</td>
            <td>{!! $persona->apellido !!}</td>
            <td>{!! $persona->cedula !!}</td>
            <td>{!! $persona->sexo !!}</td>
            <td>{!! $persona->fecha_nac !!}</td>
            <td>{!! $persona->municipio_id !!}</td>
            <td>{!! $persona->direccion !!}</td>
            <td>{!! $persona->contrato !!}</td>
            <td>{!! $persona->tipo_contrato !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personas.show', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personas.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
