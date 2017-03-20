@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New contrato</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['route' => 'contratos.store']) !!}

            @include('contratos.fields')

        {!! Form::close() !!}
    </div>
@endsection
