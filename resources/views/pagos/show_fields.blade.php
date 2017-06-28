<h1 class="pull-left">Contrato Nro {{ $contrato->numero }}</h1>
<a class="btn btn-primary pull-right" style="margin-top: 25px" href="#" data-toggle="modal" data-target="#pagos_modal" onclick="pagos({{ $contrato->id }});">Pagar</a>
  
<div class="col-md-12 panel">  
<table class="table table-hover table-responsive" id="table">
    <thead>
        <th>Numero Cuota</th>
        <th>Monto de la Cuota</th>
        <th>Concepto</th>
        <th>Fecha de Pago</th>
        <th>Tipo Pago</th>
        <th>Estatus</th>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
        <tr>
            <td>{!! $pago->numero_cuota.'/'.$cuotas !!}</td>
            <?php 
            $monto_cuota = $contrato->monto_total/$cuotas;
            $monto_cuota = number_format($monto_cuota,'2',',',' ');
            ?>    
            <td>{!! 'Bs: '.$monto_cuota.'/'.$contrato->monto_total !!}</td>
            <td>{!!  $pago->concepto !!}</td>
            @if($pago->estatus != 'pendiente')
            <td>{!! $pago->updated_at !!}</td>
            @else
            <td>-----------</td>
            @endif
            <td>{!! $pago->tipo_pago !!}</td>
            <td>{!! $pago->estatus !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
      
