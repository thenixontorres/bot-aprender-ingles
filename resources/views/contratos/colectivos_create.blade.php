@extends('layouts.app')
@section('title','Nuevo Contrato')
@section('css')
    <!-- jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.structure.css') }}">
    <!--chosen -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/chosen/chosen.css') }}">

    <script type="text/javascript">
    $(document).ready(function(){
        $('#estado_id').change(function(){
            $.get("{!! route('dropdown') !!}",
            { option: $(this).val() },
            function(data) {
                $('#municipio_id').empty();
                $.each(data, function(key, element) {
                    $('#municipio_id').append("<option value='" + element.id + "'>" + element.municipio + "</option>");
                });
            });
        });
    });     
    </script>

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

            <!-- Numero Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('numero', 'Numero de contrato:') !!}
                {!! Form::text('numero', null, ['class' => 'form-control','pattern' => '[0-9]{1,8}', 'placeholder' => 'Solo Numeros', 'required']) !!}
            </div>

            <!-- Cedula Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('cedula', 'Cedula del titular:') !!}
                {!! Form::text('cedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}', 'placeholder' => 'Solo Numeros', 'required']) !!}
            </div>

            <!--de la tabla persona -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('titular', 'Datos del titular') !!}
            </div>

            <!-- Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo', 'required']) !!}
            </div>

            <!-- Apellido Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('apellido', 'Apellido:') !!}
                {!! Form::text('apellido', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Apellido Completo', 'required']) !!}
            </div>

            <!-- Sexo Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('sexo', 'Masculino:') !!}
                <input class="form-control radio" type="radio" checked name="sexo" value="Masculino">
            </div>
            <div class="form-group col-sm-3">    
                {!! Form::label('sexo', 'Femenino:') !!} 
                <input class="form-control radio" type="radio" name="sexo" value="Femenino"> 
            </div>

            <!-- Fecha Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_nac', 'Fecha de Nacimiento:') !!}
                {!! Form::text('fecha_nac', null, ['class' => 'form-control','id' => 'fecha_nacimiento','placeholder' => 'DD/MM/AAAA', 'required']) !!}
            </div>

            <!-- telefono Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}','placeholder' => 'Solo Numeros', 'required']) !!}
            </div>

            <!-- Estado Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('estado_id', 'Estado:') !!}
                <select class="form-control" name="estado_id" id ="estado_id">
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
                <select class="form-control" name="municipio_id" id="municipio_id">
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
                {!! Form::textarea('direccion', null, ['class' => 'form-control','placeholder'=>'Parroquia,  Avenida, Casa.', 'required']) !!}
            </div>

            <!--de la tabla empresa -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('empresa', 'Datos de la Empresa:') !!}
            </div>

            <!-- empresa Nombre Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('empresa_nombre', 'Nombre de la empresa:') !!}
                {!! Form::text('empresa_nombre', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo de la Empresa', 'required']) !!}
            </div>

            <!-- empresa telefono Nac Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('empresa_telefono', 'Telefono:') !!}
                {!! Form::text('empresa_telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}', 'placeholder' => 'Solo Numeros', 'required']) !!}
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
                {!! Form::textarea('empresa_direccion', null, ['class' => 'form-control','placeholder' => 'Parroquia, Avenida, Casa', 'required']) !!}
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
                        <div class="form-group col-sm-3">
                        Mensual (6 cuotas)
                        </div>
                        <div class="form-group col-sm-3">
                        Monto total
                        </div>
                        <div class="form-group col-sm-3">
                        Elelgir
                        </div>
                    </strong>
                </div>
                @foreach($planes as $plan)
                    <div class="form-group col-sm-12">
                        <div class="row text-center">
                            <div class="form-group col-sm-3">
                                {!! $plan->plan !!}
                            </div>
                            <div class="form-group col-sm-3">
                                <?php  
                                $mensual = $plan->monto/6;
                                $mensual = number_format($mensual, 2, '.', ''); 
                                ?>
                                <input readonly name="cuotas" value="{{ $mensual }}" id="montoMensual{{$plan->id}}"> 
                            </div>
                            <div class="form-group col-sm-3">
                                <input type="text" name="monto_total" value="{{ $plan->monto }}" id="montoTotal{{$plan->id}}" onchange="dividir({{$plan->id}});">
                            </div>
                            <div class="form-group col-sm-3">
                                <input class="form-control radio" type="radio" name="plan_id" value="{!! $plan->id !!}">
                            </div>
                        </div>  
                    </div>
                @endforeach 
                </div>
            </div>   
            <!--de la tabla contrato -->
            <div class="form-group col-sm-12">
                <br>
                {!! Form::label('Contrato', 'Datos del contrato') !!}
            </div>

            <!-- Monto Inicial Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('monto_inicial', 'Monto Inicial:') !!}
                {!! Form::text('monto_inicial', null, ['class' => 'form-control','pattern' => '[0-9]{1,30}', 'placeholder' => 'Solo Numeros', 'required']) !!}
            </div>

            <!-- Fecha Inicio Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
                {!! Form::text('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio','placeholder' => 'DD/MM/AAAA', 'required']) !!}
            </div>

            <!-- Tipo Contrato Field -->
                {!! Form::hidden('tipo_contrato', 'Colectivo', ['class' => 'form-control']) !!}
            <!-- estado Field -->
                {!! Form::hidden('estado', 'Activo', ['class' => 'form-control']) !!}    

            <!-- Clausula Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('clausula_id', 'Clausulas:') !!}
                <select class="form-control" name="clausula_id">
                    @foreach($clausulas as $clausula)
                        <option value="{{ $clausula->id }}">
                             {{ $clausula->nombre }}   
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Ruta Id Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('ruta_id', 'Ruta:') !!}
                <select class="form-control" name="ruta_id">
                    @foreach($rutas as $ruta)
                        <option value="{{ $ruta->id }}">
                             {{ $ruta->direccion }}   
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

        function dividir(id){
            montoTotal = document.getElementById("montoTotal"+id).value;
            mensual = montoTotal/6;
            document.getElementById("montoMensual"+id).value =mensual;
          }; 
    </script>      
@endsection