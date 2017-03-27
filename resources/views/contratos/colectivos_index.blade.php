@extends('layouts.app')
@section('title','Contratos Individuales')
@section('content')
	<div class="col-md-12 panel">   
        <h1 class="pull-left">Contratos</h1>
        <table class="table table-responsive" id="contratos-table">
    <thead>
        <th>Numero</th>
        <th>Titular</th>
        <th>Empresa</th>
        <th>Fecha Inicio</th>
        <th>Plan</th>
        <th>Tiempo Pago</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
            @foreach($contratos as $contrato)
            <tr>  
                <td>
                    {!! $contrato->numero !!}
                </td>
                <td>
                @foreach($contrato->personas as $persona)
                    @if($persona->parentesco == 'Titular')
                        {!! $persona->nombre.' '.$persona->apellido.' '.$persona->cedula !!}
                    
                    @endif 
                @endforeach
                </td>
                <td>
                 @foreach($contrato->empresas as $empresa)
                        {!! $empresa->nombre !!}
                @endforeach
                </td>
            <td>{!! $contrato->fecha_inicio !!}</td>
            <td>{!! $contrato->plan->plan !!}</td>
            <td>{!! $contrato->tiempo_pago !!}</td>
            <td>{!! $contrato->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contratos.show', [$contrato->id]) !!}" target='_blank' class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contratos.edit', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
@endsection

