@extends('layouts.app')

@section('content')
<div class="col-md-12 panel">   

    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar Nueva Ruta</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'rutas.store']) !!}

            @include('rutas.fields')

        {!! Form::close() !!}
    </div>
</div>    
@endsection
