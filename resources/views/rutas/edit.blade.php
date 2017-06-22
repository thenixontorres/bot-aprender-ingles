@extends('layouts.app')

@section('content')
<div class="col-md-12 panel">   
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Ruta</h1>
            </div>
        </div>

        <div class="row">
            {!! Form::model($ruta, ['route' => ['rutas.update', $ruta->id], 'method' => 'patch']) !!}

            @include('rutas.fields')

            {!! Form::close() !!}
        </div>
</div>        
@endsection
