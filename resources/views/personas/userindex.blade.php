@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="col-md-12 panel">   
    	<h1 class="pull-left">Usuarios</h1>
    	<a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('personas.usercreate') !!}">Registrar</a>
        @include('personas.usertable')
</div>          
@endsection
