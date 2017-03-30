@extends('layouts.app')
@section('title','Editar Pago')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Editar Contrato</h1>
        </div>
    </div>
    <div class="row">
        {!! Form::model($pago, ['route' => ['pagos.update', $pago->id], 'method' => 'patch']) !!}

        @include('pagos.fields')

        {!! Form::close() !!}
    </div>
 </div>       
@endsection
