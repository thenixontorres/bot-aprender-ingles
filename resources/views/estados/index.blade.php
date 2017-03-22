@extends('layouts.app')
@section('title','Estados')
@section('content')
<div class="col-md-12 panel">   

        <h1 class="pull-left">Estados</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('estados.create') !!}">Registrar</a>

        <div class="clearfix"></div>

        @include('estados.table')
</div>        
@endsection
