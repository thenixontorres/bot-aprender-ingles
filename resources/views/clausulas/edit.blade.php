@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit clausula</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($clausula, ['route' => ['clausulas.update', $clausula->id], 'method' => 'patch']) !!}

            @include('clausulas.fields')

            {!! Form::close() !!}
        </div>
@endsection
