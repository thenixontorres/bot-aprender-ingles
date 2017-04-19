 <h1 class="pull-left">Pagos</h1>
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="#" data-toggle="modal" data-target="#pagos_modal" onclick="pagos({{ $contrato->id }});">Nuevo Pago</a>
    <div class="col-md-12 panel">   
    <table class="table table-responsive" id="table">
    <thead>
        <th>N° Contrato</th>
        <th>Tipo Pago</th>
        <th>Numero Cuota</th>
        <th>Monto de la Cuota</th>
        <th>Concepto</th>
        <th>Fecha de Pago</th>
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
            <td>{!!  $pago->concepto !!}</td>
            <td>{!! $pago->created_at !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
      