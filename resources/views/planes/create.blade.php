@extends('layouts.app')
@section('title','Planes')
@section('content')
<div class="col-md-12 panel">           
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar nuevo Plan</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'planes.store']) !!}

            @include('planes.fields')

        {!! Form::close() !!}
    </div>
</div>    
@endsection
