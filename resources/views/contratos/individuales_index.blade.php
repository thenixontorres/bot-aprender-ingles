@extends('layouts.app')
@section('title','Contratos Individuales')
@section('content')
	<h1 class="pull-left">Contratos</h1>
    <div class="col-md-12 panel">   
    <table class="table table-responsive" id="table">
    <thead>
        <th>Numero</th>
        <th>Titular</th>
        <th>Beneficiarios</th>
        <th>Fecha Inicio</th>
        <th>Plan</th>
        <th>Tiempo Pago</th>
        <th>Estado</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($contratos as $contrato)
        <tr>  
            <td>
                {!! $contrato->numero !!}
            </td>
            @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    <td>{!! $persona->nombre.' '.$persona->apellido.' '.$persona->cedula !!} <a href="{!! route('personas.edit', [$persona->id]) !!}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> </td>
                @endif 
            @endforeach
            <td>
            <?php  
            $cantidad = count($contrato->personas);
            echo $cantidad-1;
            ?>
             <a href="#" data-toggle="modal" data-target="#beneficiarios" class='btn btn-default btn-xs' onclick="beneficiarios({{ $contrato->id }});"><i class="glyphicon glyphicon-plus"></i>
             <a href="{!! route('personas.show', [$contrato->id]) !!}" target='_blank' class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
            </a>
            </td>
            <td>{!! $contrato->fecha_inicio->format('d/m/Y') !!}</td>
            <td>{!! $contrato->plan->plan !!}</td>
            <td>{!! $contrato->tiempo_pago !!}</td>
            <td>{!! $contrato->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contratos.show', [$contrato->id]) !!}" target='_blank' class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contratos.recibo', [$contrato->id]) !!}" target='_blank' class='btn btn-default btn-xs'><i class="glyphicon glyphicon-download"></i></a>
                    <a href="{!! route('pagos.show', [$contrato->id]) !!}" target='_blank' class='btn btn-default btn-xs'><i class="glyphicon glyphicon-euro"></i></a>
                    <!-- <a href="{!! route('contratos.edit', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    @include('contratos.beneficiarios_modal')
</div>
    </div>    
@endsection
@section('scripts')
<script type="text/javascript">

//Crear Beneficiario
function beneficiarios(id) {
    var contrato_id = document.getElementById('contrato_id');
    contrato_id.value = id;                
} 

</script>
<!--Jqueyui -->
    <script src="{{ asset('plugins/jqueryui/jquery-ui.js') }}"></script>

    <script type="text/javascript">
          $(function() {
            $( "#fecha_nacimiento" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Ver _MENU_ entradas por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Viendo la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay informacion",
                "search": "Buscar: ",
                "paginate": {
                    "previous": "Anterior ",
                    "next": " Proximo",
                }
            }
        });
    } );
</script> 
@endsection

