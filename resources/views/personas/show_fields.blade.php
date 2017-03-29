<table class="table table-responsive" id="personas-table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Sexo</th>
        <th>Fecha de Nacimiento</th>
        <th>Telefono</th>
        <th>Parentesco</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        @if($persona->parentesco != 'Titular')
            <tr>
                <td>{!! $persona->nombre !!}</td>
                <td>{!! $persona->apellido !!}</td>
                <td>{!! $persona->cedula !!}</td>
                <td>{!! $persona->sexo !!}</td>
                <td>{!! $persona->fecha_nac !!}</td>
                <td>{!! $persona->telefono !!}</td>
                <td>{!! $persona->parentesco !!}</td>
                <td>
                    {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('personas.edit', [$persona->id]) !!}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Borrar este beneficiario?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endif    
    @endforeach
    </tbody>
</table>
