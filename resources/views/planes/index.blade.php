@extends('layouts.app')
@section('title','Planes')
@section('content')
<div class="col-md-12 panel">           
        <h1 class="pull-left">Planes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('planes.create') !!}">Registrar</a>

        @include('planes.table')
</div>        
@endsection
