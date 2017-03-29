 <h1 class="pull-left">Pagos</h1>
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="#" data-toggle="modal" data-target="#pagos_modal" onclick="pagos({{ $contrato->id }});">Nuevo Pago</a>
    <div class="col-md-12 panel">   
    <table class="table table-responsive" id="table">
    <thead>
        <th>N° Contrato</th>
        <th>Tipo Pago</th>
        <th>Numero Cuota</th>
        <th>Monto de la Cuota</th>
        <th>Monto Cancelado</th>
        <th>Fecha de Pago</th>
        <th>Accion</th>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
        <tr>
            <td>{!! $pago->contrato->numero !!}</td>
            <td>{!! $pago->tipo_pago !!}</td>
            <td>{!! $pago->numero_cuota.'/'.$cuotas !!}</td>
            <?php 
            $monto_cuota = $contrato->monto_total/$cuotas;
            $monto_cuota = number_format($monto_cuota,'2',',',' ');
            ?>    
            <td>{!! 'Bs: '.$monto_cuota !!}</td>
            <td>{!! 'Bs: '.$pago->monto !!}</td>
            <td>{!! $pago->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['pagos.destroy', $pago->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pagos.edit', [$pago->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
      