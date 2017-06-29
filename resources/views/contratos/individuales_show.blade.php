@extends('layouts.doc')
@section('title','Contratos Individuales')
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive" src="{{ asset('img/logo-contrato.jpg') }}">  
        </div>
        <div class="col-md-4 text-center">
            <P>TELEFONO DE EMERGENCIA</P>
            <P>(0414)4650610-(0246)4320792-(0424)3800530</P>
            <P>Contrato: {{ $contrato->numero}}</P>
            <P>Codigo Cliente: {{ $contrato->numero}}</P>  
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-justify">
            Entre SERVICIOS FUNERARIOS Y PREVISTOS VIRGEN DE COROMOT C.A Con domicilio en la Av. Monseñor Sendrea Edif Colonial Piso 1 Ofic. 11, debidamente inscrita por ante el Registro Mercantil de la Circuscripcion Judicial del Edo. Guárico bajo el Nro. 26, tomo 06-A; a quien a estos efectos de denomina "LA EMPREASA", por una parte y por la otra parte el cuidadano abajo identificado en la Cláusula primera, quien en lo sucesivo se denominará "EL TITULAR", se ha convenido a celebrar el presente convenio de protección funeraria según los datos que a continuación aparecen en forma detallada.  
        </div>
    </div>
    
    <div class="row border gray">
        <strong>
        <div class="col-md-2">SECCION "A"</div>
        <div class="col-md-10 text-right">IDENTIFICACION TITULAR Y GRUPO FAMILIAR</div>
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
        <div class="col-md-1 border">N°</div>
        <div class="col-md-4 border"> Beneficiarios </div>
        <div class="col-md-2 border">Cedula  </div>
        <div class="col-md-1 border">Edad</div>
        <div class="col-md-2 border">Parentesco </div>
        <div class="col-md-2 border">Fecha nac </div>
    </div>
    <?php $i=1; ?>
        @foreach($contrato->personas as $persona)
     <div class="row ">
        <div class="col-md-1 border"> {!! $i !!} </div>
        <div class="col-md-4 border"> {!! $persona->nombre.' '.$persona->apellido !!} </div>
        <div class="col-md-2 border"> {!! $persona->cedula!!}  </div>
        <?php 
        $fecha_nac = explode('/',$persona->fecha_nac);
        $dia_ac = date('d');
        $mes_ac = date('m');
        $año_ac = date('Y');

        if(($fecha_nac[1] == $mes_ac) && ($fecha_nac[1] > $dia_ac)){
            $año_ac = $año_ac-1;
        }
        if($fecha_nac[1] > $mes_ac){
            $año_ac = $año_ac-1;
        }
        $edad = $año_ac-$fecha_nac[2]; 
        ?>
        <div class="col-md-1 border"> {{ $edad }} </div>
        <div class="col-md-2 border">{!! $persona->parentesco !!} </div>
        <div class="col-md-2 border">{!! $persona->fecha_nac !!} </div>
    </div>
        <?php $i++; ?>
        @endforeach
    <div class="row">
        <div class="col-md-12 border">Observaciones</div>
        <?php $x=1;?>
        @foreach($contrato->personas as $persona)
            @if(isset($persona->observacion))
            <div class="col-md-12 border">El beneficiario numero {{ $x.' '.$persona->nombre.' '.$persona->apellido.' '.$persona->observacion }}.</div>
            @endif
            <?php $x++; ?>
        @endforeach
    </div>           
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
        <div class="col-md-1 border">Cuotas</div>
        <div class="col-md-2 border">Cuota {!! $contrato->tiempo_pago !!}</div>
        <div class="col-md-2 border">Fecha Emision</div>
        <div class="col-md-2 border">Fecha Vencimiento:</div>
        <div class="col-md-1 border">Afiliados</div>
        <div class="col-md-2 border">Dir Cobro</div>
    </div>
    <div class="row ">
        <div class="col-md-2 border">{!! 'Bs: '.$contrato->monto_total !!}</div>
        <div class="col-md-1 border">
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
        <div class="col-md-1 border">{{ $i-1 }}</div>
        <div class="col-md-2 border">Casa</div>
    </div>
    <div class="row ">
        <div class="col-md-4 border">Monto Inicial:</div>
        <div class="col-md-8 border">{!! 'Bs: '.$contrato->monto_inicial !!}:</div>
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
