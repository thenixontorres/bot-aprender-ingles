@extends('layouts.app')
@section('title','Estados')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Editar Estado</h1>
        </div>
    </div>

    <div class="row">
        {!! Form::model($estado, ['route' => ['estados.update', $estado->id], 'method' => 'patch']) !!}

        @include('estados.fields')

        {!! Form::close() !!}
    </div>
</div>        
@endsection
