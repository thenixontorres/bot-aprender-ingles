@extends('layouts.app')
@section('title','Nuevo Contrato')
@section('css')
    <!-- jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.structure.css') }}">
    <!--chosen -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.css') }}">
@endsection
@section('content')
    <div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar Contrato Colectivo</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'contratos.store']) !!}

            <!--de la tabla persona -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('titular', 'Datos del titular') !!}
            </div>

            <!-- Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Apellido Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('apellido', 'Apellido:') !!}
                {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Cedula Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('cedula', 'Cedula:') !!}
                {!! Form::text('cedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}']) !!}
            </div>

            <!-- Sexo Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('sexo', 'Masculino:') !!}
                <input class="form-control radio" type="radio" name="sexo" value="Masculino">
            </div>
            <div class="form-group col-sm-3">    
                {!! Form::label('sexo', 'Femenino:') !!} 
                <input class="form-control radio" type="radio" name="sexo" value="Femenino"> 
            </div>

            <!-- Fecha Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_nac', 'Fecha de Nacimiento:') !!}
                {!! Form::text('fecha_nac', null, ['class' => 'form-control','id' => 'fecha_nacimiento']) !!}
            </div>

            <!-- telefono Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Estado Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('estado_id', 'Estado:') !!}
                <select class="form-control" name="estado_id">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">
                             {{ $estado->estado }}   
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Municipio Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('municipio_id', 'Municipio:') !!}
                <select class="form-control" name="municipio_id">
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">
                             {{ $municipio->municipio }}   
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('direccion', 'Direccion:') !!}
                {!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
            </div>

            <!--de la tabla persona -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('empresa', 'Datos de la emppresa:') !!}
            </div>

            <!-- empresa Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('empresa_nombre', 'Nombre de la empresa:') !!}
                {!! Form::text('empresa_nombre', null, ['class' => 'form-control']) !!}
            </div>

            <!-- empresa telefono Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('empresa_telefono', 'Telefono:') !!}
                {!! Form::text('empresa_telefono', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Estado Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('estado_id', 'Estado:') !!}
                <select class="form-control" name="empresa_estado_id">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">
                             {{ $estado->estado }}   
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Municipio Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('municipio_id', 'Municipio:') !!}
                <select class="form-control" name="empresa_municipio_id">
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">
                             {{ $municipio->municipio }}   
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Direccion Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('empresa_direccion', 'Direccion de la empresa:') !!}
                {!! Form::textarea('empresa_direccion', null, ['class' => 'form-control']) !!}
            </div>
            <!--de la tabla planes -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('planes', 'Seleccion de Plan') !!}
            </div>
            <div class="col-sm-12">
                <div class="row text-center">
                <strong>
                <div class="form-group col-sm-3">
                Plan
                </div>
                <div class="form-group col-sm-2">
                Mensual (6 cuotas)
                </div>
                <div class="form-group col-sm-2">
                Semanal (12 cuotas)
                </div>
                <div class="form-group col-sm-2">
                Quicenal (24 cuotas)
                </div>
                <div class="form-group col-sm-3">
                Monto total
                </div>
                </strong>
                </div>
                @foreach($planes as $plan)
                    <div class="form-group col-sm-12">
                    <div class="row text-center">
                    <div class="form-group col-sm-3">
                    {!! $plan->plan !!}
                    </div>
                    <div class="form-group col-sm-2">
                    <?php  
                    $mensual = $plan->monto/6;
                    $mensual = number_format($mensual, 2, '.', ''); 
                    ?>
                    {!! 'Bs: '.$mensual !!}
                    </div>
                    <div class="form-group col-sm-2">
                    <?php  
                    $semanal = $plan->monto/12;
                    $semanal = number_format($semanal, 2, '.', ''); 
                    ?>
                    {!! 'Bs: '.$semanal !!}
                    </div>
                    <div class="form-group col-sm-2">
                    <?php  
                    $quincenal = $plan->monto/24;
                    $quincenal = number_format($quincenal, 2, '.', ''); 
                    ?>
                    {!! 'Bs: '.$quincenal !!}
                    </div>
                    <div class="form-group col-sm-3">
                    {!! 'Bs: '.$plan->monto !!}
                    </div>
                    </div>
                    <div class="row text-center">
                    <div class="form-group col-sm-3">
                    <input class="form-control radio" type="radio" name="plan_id" value="{!! $plan->id !!}">
                    </div>
                    <div class="form-group col-sm-2">
                    <input class="form-control radio" type="radio" name="tiempo_pago" value="Mensual">
                    </div>
                    <div class="form-group col-sm-2">
                    <input class="form-control radio" type="radio" name="tiempo_pago" value="Semanal">
                    </div>
                    <div class="form-group col-sm-2">
                    <input class="form-control radio" type="radio" name="tiempo_pago" value="Quincenal">
                    </div>
                    <div class="form-group col-sm-3">
                    </div>
                    </div>
                    <hr>
                    </div>
                @endforeach 
                </div>
            </div>   
            <!--de la tabla contrato -->
            <div class="form-group col-sm-12">
                <br>
                {!! Form::label('titular', 'Datos del contrato') !!}
            </div>

            <!-- Numero Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('numero', 'Numero de contrato:') !!}
                {!! Form::text('numero', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Monto Inicial Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('monto_inicial', 'Monto Inicial:') !!}
                {!! Form::text('monto_inicial', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Fecha Inicio Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
                {!! Form::text('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio']) !!}
            </div>

            <!-- Fecha Vencimiento Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('fecha_vencimiento', 'Fecha Vencimiento:') !!}
                {!! Form::text('fecha_vencimiento', null, ['class' => 'form-control', 'id' => 'fecha_vencimiento']) !!}
            </div>

            <!-- Tipo Contrato Field -->
                {!! Form::hidden('tipo_contrato', 'Colectivo', ['class' => 'form-control']) !!}
            <!-- estado Field -->
                {!! Form::hidden('estado', 'Activo', ['class' => 'form-control']) !!}    

            <!-- Clausula Id Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('clausula_id', 'Clausulas:') !!}
                <select class="form-control" name="clausula_id">
                    @foreach($clausulas as $clausula)
                        <option value="{{ $clausula->id }}">
                             {{ $clausula->nombre }}   
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('contratos.colectivos') !!}" class="btn btn-default">Cancelar</a>
            </div>

        {!! Form::close() !!}
    </div>
     </div>
@endsection
@section('scripts')
    <!--Jqueyui -->
    <script src="{{ asset('plugins/jqueryui/jquery-ui.js') }}"></script>

    <script type="text/javascript">
          $(function() {
            $( "#fecha_inicio" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });
          $(function() {
            $( "#fecha_vencimiento" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });
          $(function() {
            $( "#fecha_nacimiento" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });
    </script>      
@endsection