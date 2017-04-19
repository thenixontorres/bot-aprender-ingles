@extends('layouts.app')
@section('title','Municipios')

@section('content')
 <div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Registrar nuevo Municipio</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'municipios.store']) !!}

            @include('municipios.fields')

        {!! Form::close() !!}
    </div>
</div>  
@endsection
