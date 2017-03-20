@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit planes</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($planes, ['route' => ['planes.update', $planes->id], 'method' => 'patch']) !!}

            @include('planes.fields')

            {!! Form::close() !!}
        </div>
@endsection
