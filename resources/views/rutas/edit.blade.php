@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit ruta</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($ruta, ['route' => ['rutas.update', $ruta->id], 'method' => 'patch']) !!}

            @include('rutas.fields')

            {!! Form::close() !!}
        </div>
@endsection
