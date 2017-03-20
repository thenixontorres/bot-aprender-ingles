@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit modificacion</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($modificacion, ['route' => ['modificacions.update', $modificacion->id], 'method' => 'patch']) !!}

            @include('modificacions.fields')

            {!! Form::close() !!}
        </div>
@endsection
