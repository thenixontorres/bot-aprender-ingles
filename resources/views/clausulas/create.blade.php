@extends('layouts.app')

@section('content')
<div class="col-md-12 panel">    
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Agregar Clausula</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'clausulas.store', 'files' => 'true']) !!}

            @include('clausulas.fields')

        {!! Form::close() !!}
    </div>
</div>    
@endsection
