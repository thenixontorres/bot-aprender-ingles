@extends('layouts.app')
@section('title','Municipios')
@section('content')
<div class="col-md-12 panel">   
        <h1 class="pull-left">Municipios</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('municipios.create') !!}">Registrar</a>
        @include('municipios.table')
</div>        
@endsection
