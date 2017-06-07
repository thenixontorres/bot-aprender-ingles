@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Rutas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('rutas.create') !!}">Registrar</a>

        <div class="clearfix"></div>

        <div class="clearfix"></div>

        @include('rutas.table')
        
@endsection
