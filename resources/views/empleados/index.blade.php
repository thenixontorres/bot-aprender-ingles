@extends('layouts.app')

@section('content')
<div class="col-md-12 panel">   

        <h1 class="pull-left">Empleados</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('empleados.create') !!}">Agregar</a>

        <div class="clearfix"></div>


        <div class="clearfix"></div>

        @include('empleados.table')
</div>        
@endsection
