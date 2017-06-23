@extends('layouts.app')
@section('title','Editar Persona')

@section('content')
    <div class="col-md-12 panel">   
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Editar Persona</h1>
            </div>
        </div>
        <div class="row">
            {!! Form::model($user, ['route' => ['personas.userupdate', $user->id], 'method' => 'patch']) !!}

            @include('personas.userfields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
