<table class="table table-responsive" id="municipios-table">
    <thead>
        <th>Municipio</th>
        <th>Estado</th>
        <th colspan="3">Accion</th>
    </thead>
    <tbody>
    @foreach($municipios as $municipio)
        <tr>
            <td>{!! $municipio->municipio !!}</td>
            <td>{!! $municipio->estado->estado !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('municipios.edit', [$municipio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
