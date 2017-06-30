@extends('layouts.doc')
@section('title','Contratos Colectivos')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-md-12">
            <img class="img-responsive" style="min-width: 100%;" src="{{ asset('img/logo-recibo.jpg') }}">  
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 border">
            Contrato:
        </div>
        <div class="col-md-3 border">
            {{ $contrato->numero }}
        </div>
        <div class="col-md-3 border">
            Cedula:
        </div>
        <div class="col-md-3 border">
            {{ $titular->cedula }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 border">
            Cliente:
        </div>
        <div class="col-md-3 border">
            {{ $titular->nombre.' '.$titular->apellido }}
        </div>
        <div class="col-md-3 border">
            Telefono:
        </div>
        <div class="col-md-3 border">
            {{ $titular->telefono }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 border">
            Direccion:
        </div>
        <div class="col-md-8 border">
            {{ $titular->direccion }}
        </div>
    </div>
    <div class="row border">
        @foreach($contrato->pagos as $pago)
        <div class="col-md-1">
            <img class="img-responsive" style="min-width: 100%;" src="{{ asset('img/logo-recibo-inverse.jpg') }}"> 
        </div>
        <div class="col-md-1" style="writing-mode: vertical-lr; transform: rotate(180deg);">
        <?php $monto = number_format($pago->monto, 2, ',', ''); ?>
            <p> {{'Cuota: '.$pago->numero_cuota.'   Monto: '.$monto }} </p>
            <p> {{'Contrato: '.$contrato->numero.' Fecha: '.$pago->concepto }}</p>
        </div>
        @endforeach
    </div>
</div>		
@endsection
