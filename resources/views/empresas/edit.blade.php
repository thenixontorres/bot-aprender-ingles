@extends('layouts.app')
@section('title','Editar Empresa')
@section('content')
        <div class="col-md-12 panel">   
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="pull-left">Editar Empresa</h1>
                </div>
            </div> 
            <div class="row">
                {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'patch']) !!}

                @include('empresas.fields')

                {!! Form::close() !!}
            </div>
        </div>
@endsection
