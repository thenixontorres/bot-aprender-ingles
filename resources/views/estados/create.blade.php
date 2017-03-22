@extends('layouts.app')
@section('title','Estados')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar nuevo Estado</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'estados.store']) !!}

            @include('estados.fields')

        {!! Form::close() !!}
    </div>
</div>    
@endsection
