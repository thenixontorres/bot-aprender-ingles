@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit municipio</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($municipio, ['route' => ['municipios.update', $municipio->id], 'method' => 'patch']) !!}

            @include('municipios.fields')

            {!! Form::close() !!}
        </div>
@endsection
