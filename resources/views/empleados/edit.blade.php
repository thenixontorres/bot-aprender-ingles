@extends('layouts.app')

@section('content')
<div class="col-md-12 panel">   
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Empleado</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($empleado, ['route' => ['empleados.update', $empleado->id], 'method' => 'patch']) !!}

            @include('empleados.fields')

            {!! Form::close() !!}
        </div>
</div>        
@endsection
