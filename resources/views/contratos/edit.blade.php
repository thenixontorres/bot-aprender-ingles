@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit contrato</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($contrato, ['route' => ['contratos.update', $contrato->id], 'method' => 'patch']) !!}

            @include('contratos.fields')

            {!! Form::close() !!}
        </div>
@endsection
