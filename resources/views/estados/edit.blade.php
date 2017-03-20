@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit estado</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($estado, ['route' => ['estados.update', $estado->id], 'method' => 'patch']) !!}

            @include('estados.fields')

            {!! Form::close() !!}
        </div>
@endsection
