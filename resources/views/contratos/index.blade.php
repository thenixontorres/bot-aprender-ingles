@extends('layouts.app')
@section('title','Contratos Individuales')
@section('content')
	<div class="col-md-12 panel">   
        <h1 class="pull-left">Contratos Individuales</h1>
        @include('contratos.table')
    </div>    
@endsection
