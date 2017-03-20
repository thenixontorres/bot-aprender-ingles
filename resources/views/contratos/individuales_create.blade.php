@extends('layouts.app')

@section('content')
    <div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar Contrato Individual</h1>
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
                {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
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
                {!! Form::text('fecha_nac', null, ['class' => 'form-control']) !!}
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
                <select class="form-control" name="estado_id">
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
                    <input class="form-control radio" type="radio" name="plan_id" value="$plan->id">
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
                    </div>
                @endforeach 
                </div>
            </div>   
            <!--de la tabla contrato -->
            <div class="form-group col-sm-12">
                <hr>
                <br>
                {!! Form::label('titular', 'Datos del contrato') !!}
            </div>

            <!-- Fecha Inicio Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
                {!! Form::text('fecha_inicio', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tipo Contrato Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('tipo_contrato', 'Tipo Contrato:') !!}
                {!! Form::text('tipo_contrato', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Clausula Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('clausula_id', 'Clausula Id:') !!}
                {!! Form::text('clausula_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Plan Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('plan_id', 'Plan Id:') !!}
                {!! Form::text('plan_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Tiempo Pago Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('tiempo_pago', 'Tiempo Pago:') !!}
                {!! Form::text('tiempo_pago', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('contratos.index') !!}" class="btn btn-default">Cancel</a>
            </div>


        {!! Form::close() !!}
    </div>
     </div>
@endsection
