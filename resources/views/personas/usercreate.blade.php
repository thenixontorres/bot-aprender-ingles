@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar nuevo Usuario</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'personas.userstore']) !!}

            @include('personas.userfields')

        {!! Form::close() !!}
    </div>
</div>    
@endsection
