@extends('layouts.app')
@section('title','Editar Componente')
@section('content')
       <div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Editar Componente</h1>
        </div>
    </div>
    <div class="row">
           {!! Form::model($componente, ['route' => ['componentes.update', $componente->id], 'method' => 'patch']) !!}

            <!-- Componete Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('componente', 'Componente:') !!}
            {!! Form::text('componente', null, ['class' => 'form-control']) !!}
        </div>

            {!! Form::hidden('planes_id', null, ['class' => 'form-control']) !!}
       
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
        </div>

            {!! Form::close() !!}
        </div>
    </div>    
@endsection
