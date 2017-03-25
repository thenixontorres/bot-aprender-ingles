@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit componente</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($componente, ['route' => ['componentes.update', $componente->id], 'method' => 'patch']) !!}

            @include('componentes.fields')

            {!! Form::close() !!}
        </div>
@endsection
