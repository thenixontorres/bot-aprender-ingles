@extends('layouts.doc')
@section('title','Contratos Colectivos')
@section('content')
<div class="col-md-12 panel">   
    <div class="row border gray">
        <strong>
        <div class="col-md-2">SECCION "A"</div>
        <div class="col-md-10 text-right">IDENTIFICACION TITULAR Y LA EMPRESA</div>
        </strong>
    </div>
    <br>
    <div class="row ">
        <div class="col-md-2 border">Titular:</div>
        <div class="col-md-6 border">
        @foreach($contrato->personas as $persona)
            @if($persona->parentesco == 'Titular')
                {!! $persona->nombre.' '.$persona->apellido !!}
            @endif 
        @endforeach    
        </div>
        <div class="col-md-2 border">Cedula:</div>
        <div class="col-md-2 border">@foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->cedula !!}
                @endif 
        @endforeach</div>
    </div>
    <div class="row ">
        <div class="col-md-2 border">Fecha de Nacimiento:</div>
        <div class="col-md-2 border">
        @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->fecha_nac !!}
                    <?php $fecha_nac = explode('/',$persona->fecha_nac);
                    ?>
                @endif 
        @endforeach
        <?php  
        if(($fecha_nac[1] == $mes_ac) && ($fecha_nac[1] > $dia_ac)){
            $año_ac = $año_ac-1;
        }
        if($fecha_nac[1] > $mes_ac){
            $año_ac = $año_ac-1;
        }
        $edad = $año_ac-$fecha_nac[2]; 
        ?>
        </div>
        <div class="col-md-2 border">Edad:</div>
        <div class="col-md-2 border"> {!! $edad !!} </div>
        <div class="col-md-2 border">Tlf Habitacion:</div>
        <div class="col-md-2 border">
        @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! $persona->telefono !!}
                @endif 
        @endforeach
        </div>
    </div>
    <div class="row ">
        <div class="col-md-4 border">Direccion de Habitacion:</div>
        <div class="col-md-8 border">
        @foreach($contrato->personas as $persona)
                @if($persona->parentesco == 'Titular')
                    {!! 'Estado '.$persona->municipio->estado->estado.', Municipio '.$persona->municipio->municipio.', '.$persona->direccion !!}
                @endif 
        @endforeach
        </div>
    </div>
    <br>
    <div class="row ">
        <div class="col-md-4 border"> Nombre </div>
        <div class="col-md-4 border">Telefono  </div>
        <div class="col-md-4 border">Direccion</div>
    </div>
        @foreach($contrato->empresas as $empresa)
     <div class="row ">
        <div class="col-md-4 border"> {!! $empresa->nombre !!} </div>
        <div class="col-md-4 border"> {!! $empresa->telefono !!} </div>
        <div class="col-md-4 border">{!! $empresa->direccion !!} </div>
    </div>
        @endforeach       
    <br>  
    <div class="row border gray">
        <strong>
        <div class="col-md-2">SECCION "B"</div>
        <div class="col-md-10 text-right">COMPONENTES DE CADA SERVICIO Y COBERTURA TERRITORIAL</div>
        </strong>
    </div>
    <br>
    <div class="row ">
        <div class="col-md-4 border">Plan:</div>
        <div class="col-md-8 border">
        {!! $contrato->plan->plan !!}
        </div>
    </div>
     <div class="row border">
        @foreach($contrato->plan->componentes as $componente)
            <div class="col-md-6">
            <p>{!! $componente->componente !!}</p>
            </div>
        @endforeach
    </div>
    <br>
     <div class="row border gray">
        <strong>
        <div class="col-md-2">SECCION "C"</div>
        <div class="col-md-10 text-right">COMPONENTES Y CONDICIONES DE PAGO</div>
        </strong>
    </div>
    <br>
    <div class="row ">
        <div class="col-md-2 border">Monto Total:</div>
        <div class="col-md-2 border">Cuotas</div>
        <div class="col-md-2 border">Cuota {!! $contrato->tiempo_pago !!}</div>
        <div class="col-md-2 border">Fecha Emision</div>
        <div class="col-md-2 border">Fecha Vencimiento:</div>
        <div class="col-md-2 border">Dir Cobro</div>
    </div>
    <div class="row ">
        <div class="col-md-2 border">{!! 'Bs: '.$contrato->monto_total !!}</div>
        <div class="col-md-2 border">
        <?php  
        if($contrato->tiempo_pago == "Quincenal"){
            $cuotas = 24;
        }elseif($contrato->tiempo_pago == "Semanal"){
            $cuotas = 12;
         }else{
            $cuotas = 6;
         }      
         ?>
        {!! $cuotas!!}</div>
        <div class="col-md-2 border">
        <?php 
        $cuota_mensual = $contrato->monto_total/$cuotas;
        $cuota_mensual= number_format($cuota_mensual,'2',',',' ');
        ?>    
        {!! 'Bs: '.$cuota_mensual !!}</div>
        <div class="col-md-2 border">{!! $contrato->created_at!!}</div>
        <div class="col-md-2 border">{!! $contrato->fecha_vencimiento !!}</div>
        <div class="col-md-2 border">Casa</div>
    </div>
    <div class="row ">
        <div class="col-md-4 border">Monto Inicial:</div>
        <div class="col-md-8 border">{!! 'Bs: '.$contrato->monto_inicial !!}</div>
    </div>
    <br>
    <div class="row ">
        <div class="col-md-8 border">
        <p>NOTA:</p>
        <p>1. Favor los pagos funerarios en cheques hacerlo a nombre de: Servicios Funerarios y Previsivos Virgen de Coromoto C.A </p>
        <p>2. La primera cuota se cobrara a los treinta (30) dias de la firma de este convenio.</p>
        <p>3. Se cobrara un recargo en caso de cheque devuelto.</p>
        <p>4. Este convenio no tendra validez si presenta enmienda o datos falsos.</p>
        </div>
        <div class="col-md-4 border text-center">
        <br>    
        <p>Aprobado Por</p>
        <p>Servicios Funerarios y </p>
        <p>Previsivos Virgen de </p>
        <p>Coromoto C.A </p>
        <p>______________________</p>
        </div>
    </div>
</div>		
@endsection
