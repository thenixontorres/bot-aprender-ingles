@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Contratos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('contratos.create') !!}">Registrar Contrato</a>

        @include('contratos.table')
        
@endsection
