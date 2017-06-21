@extends('layouts.app')
@section('title','Editar Contrato')
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
            <h1 class="pull-left">Editar Contrato</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::model($contrato, ['route' => ['contratos.update', $contrato->id], 'method' => 'patch']) !!}

            <hr>

        <!-- Numero Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('numero', 'Numero de contrato:') !!}
                {!! Form::text('numero', null, ['class' => 'form-control','pattern' => '[0-9]{1,8}', 'placeholder' => 'Solo Numeros', 'required']) !!}
            </div>

        <!-- Monto Inicial Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('monto_inicial', 'Monto Inicial:') !!}
                {!! Form::text('monto_inicial', null, ['class' => 'form-control','pattern' => '[0-9]{1,30}', 'placeholder' => 'Solo Numeros', 'required']) !!}
            </div>

        <!-- Fecha Inicio Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
                {!! Form::text('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio','placeholder' => 'DD/MM/AAAA', 'required']) !!}
            </div>

        <!-- Tipo Contrato Field -->
            {!! Form::hidden('tipo_contrato', 'Individual', ['class' => 'form-control']) !!}
        <!-- plan_id Contrato Field -->
            {!! Form::hidden('plan_id', $contrato->plan_id, ['class' => 'form-control']) !!}    

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
        <!-- Estado Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('estado', 'Estado:') !!}
            <select class="form-control" name="estado">
                    @if ($contrato->estado == 'Activo')
                    <option value="Activo" selected>
                    Activo
                    </option>
                    <option value="Inactivo">
                    Inactivo
                    </option>
                    @else
                    <option value="Activo">
                    Activo
                    </option>
                    <option value="Inactivo"  selected>
                    Inactivo
                    </option>
                    @endif 
            </select>
        </div>
            <!-- Ruta Id Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('ruta_id', 'Ruta:') !!}
                <select class="form-control" name="ruta_id">
                    @foreach($rutas as $ruta)
                        @if ($ruta->id == 'contrato->ruta->id')
                        <option selected value="{{ $ruta->id }}">
                             {{ $ruta->direccion }}   
                        </option>
                        @else
                        <option value="{{ $ruta->id }}">
                             {{ $ruta->direccion }}   
                        </option>
                        @endif
                    @endforeach
                </select>
            </div>
        <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('contratos.individuales') !!}" class="btn btn-default">Cancelar</a>
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
    </script>      
@endsection
