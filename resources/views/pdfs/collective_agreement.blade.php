<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Contrato Colectivo N°: {{ $contrato->numero }}</title>
		<style type="text/css">
			body {
				padding: 0px;
				margin: 0px;
				font-size: 11px;
			}

			table {
				width: 100%;
			}

			.text-center {
				text-align: center;
			}
			
			.text-justify {
				text-align: justify;
			}

			.bg-grey {
				background-color: grey;
			}

			table.bordered tr td {
				border: 1px solid black;
				padding-left: 4px; 
			}
		</style>
	</head>
	<body>
		<table id="head" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 55%;">
					<img class="img-responsive" style="min-width: 100%;" src="{{ asset('img/logo-contrato.jpg') }}">
				</td>
				<td style="width: 45%;">
					<P class="text-center" style="line-height: 1.8em;">
						TELEFONO DE EMERGENCIA<br>
						(0414)4650610-(0246)4320792-(0424)3800530<br>
						Contrato: {{ $contrato->numero }}<br>
						Codigo Cliente: {{ $contrato->numero }}
					</P>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="text-justify">
						Entre SERVICIOS FUNERARIOS Y PREVISTOS VIRGEN DE COROMOT C.A Con domicilio en la Av. 
						Monseñor Sendrea Edif Colonial Piso 1 Ofic. 11, debidamente inscrita por ante el Registro 
						Mercantil de la Circuscripcion Judicial del Edo. Guárico bajo el Nro. 26, tomo 06-A; a quien a 
						estos efectos de denomina "LA EMPREASA", por una parte y por la otra parte el cuidadano abajo 
						identificado en la Cláusula primera, quien en lo sucesivo se denominará "EL TITULAR", 
						se ha convenido a celebrar el presente convenio de protección funeraria según los datos que a 
						continuación aparecen en forma detallada.
					</p>
				</td>
			</tr>
		</table>
		<!-- Seccion A -->
		<br>
		<table class="bg-grey">
			<tr>
				<td style="text-align: left;">
					<strong>SECCIÓN "A"</strong>
				</td>
				<td style="text-align: right;">
					<strong>IDENTIFICACION TITULAR Y LA EMPRESA</strong>
				</td>
			</tr>
		</table>
		<br>
		<table class="bordered" cellspacing="0">
			<tr>
				<td>Titular:</td>
				<td colspan="3">
					@foreach($contrato->personas as $persona)
			            @if($persona->parentesco == 'Titular')
			                {!! $persona->nombre.' '.$persona->apellido !!}
			            @endif 
			        @endforeach
				</td>
				<td>Cedula:</td>
				<td>
					@foreach($contrato->personas as $persona)
		                @if($persona->parentesco == 'Titular')
		                    {!! $persona->cedula !!}
		                @endif 
		        	@endforeach
				</td>
			</tr>
			<tr>
				<td>Fecha de Nacimiento:</td>
				<td>
					@foreach($contrato->personas as $persona)
		                @if($persona->parentesco == 'Titular')
		                    {!! $persona->fecha_nac !!}
		                    <?php $fecha_nac = explode('/',$persona->fecha_nac);
		                    ?>
		                @endif
			        @endforeach
				</td>
				<?php  
			        if(($fecha_nac[1] == $mes_ac) && ($fecha_nac[1] > $dia_ac)){
			            $año_ac = $año_ac-1;
			        }
			        if($fecha_nac[1] > $mes_ac){
			            $año_ac = $año_ac-1;
			        }
			        $edad = $año_ac-$fecha_nac[2]; 
			    ?>
				<td>Edad:</td>
				<td>
					{!! $edad !!}
				</td>
				<td>Tlf Habitacion:</td>
				<td>
					@foreach($contrato->personas as $persona)
		                @if($persona->parentesco == 'Titular')
		                    {!! $persona->telefono !!}
		                @endif 
			        @endforeach
				</td>
			</tr>
			<tr>
				<td colspan="2">Direccion de Habitacion:</td>
				<td colspan="4">
					@foreach($contrato->personas as $persona)
		                @if($persona->parentesco == 'Titular')
		                    {!! 'Estado '.$persona->municipio->estado->estado.', Municipio '.$persona->municipio->municipio.', '.$persona->direccion !!}
		                @endif 
			        @endforeach
				</td>
			</tr>
		</table>
		<br>
		<table class="bordered" cellspacing="0">
			<tr>
				<td>Nombre</td>
				<td>Telefono</td>
				<td>Direccion</td>
			</tr>
			@foreach($contrato->empresas as $empresa)
			    <tr>
			        <td> {!! $empresa->nombre !!} </td>
			        <td> {!! $empresa->telefono !!} </td>
			        <td>{!! $empresa->direccion !!} </td>
			    </tr>
        	@endforeach 
		</table>
		<!-- Seccion b -->
		<br>
		<table class="bg-grey">
			<tr>
				<td style="text-align: left;">
					<strong>SECCIÓN "B"</strong>
				</td>
				<td style="text-align: right;">
					<strong>COMPONENTES DE CADA SERVICIO Y COBERTURA TERRITORIAL</strong>
				</td>
			</tr>
		</table>
		<br>
		<table class="bordered" cellspacing="0">
			<tr>
				<td>Plan:</td>
				<td>
					{!! $contrato->plan->plan !!}
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table>
						@foreach($contrato->plan->componentes as $componente)
				            <tr>
				            	<td style="border: none">{!! $componente->componente !!}</td>
				            </tr>
				        @endforeach
					</table>
				</td>
			</tr>
		</table>
		<!-- Seccion C -->
		<br>
		<table class="bg-grey">
			<tr>
				<td style="text-align: left;">
					<strong>SECCIÓN "C"</strong>
				</td>
				<td style="text-align: right;">
					<strong>COMPONENTES Y CONDICIONES DE PAGO</strong>
				</td>
			</tr>
		</table>
		<br>
		<table class="bordered" cellspacing="0">
			<tr>
				<td>Monto Total:</td>
				<td>Cuotas:</td>
				<td>Cuota {!! $contrato->tiempo_pago !!}</td>
				<td>Fecha Emision:</td>
				<td>Fecha Vencimiento:</td>
				<td>Dir Cobro:</td>
			</tr>
			<tr>
				<td>
					{!! 'Bs: '.$contrato->monto_total !!}
				</td>
				<?php  
			        if($contrato->tiempo_pago == "Quincenal") {
			            $cuotas = 24;
			        } elseif($contrato->tiempo_pago == "Semanal") {
			            $cuotas = 12;
			        } else {
			            $cuotas = 6;
			        }      
		        ?>
				<td>
					{!! $cuotas !!}
				</td>
				<?php 
			        $cuota_mensual = $contrato->monto_total/$cuotas;
			        $cuota_mensual= number_format($cuota_mensual,'2',',',' ');
			    ?>
				<td>{!! 'Bs: '.$cuota_mensual !!}</td>
				<td>
					{!! $contrato->created_at->format('d/m/Y') !!}
				</td>
				<td>{!! $contrato->fecha_vencimiento->format('d/m/Y') !!}</td>
				<td>
					Casa
				</td>
			</tr>
			<tr>
				<td colspan="2">Monto Inicial:</td>
				<td colspan="4">
					{!! 'Bs: '.$contrato->monto_inicial !!}
				</td>
			</tr>
		</table>
		<br>
		<table class="bordered" cellspacing="0">
			<tr>
				<td>
					<p>
						NOTA:<br>
						1. Favor los pagos funerarios en cheques hacerlo a nombre de: Servicios Funerarios y Previsivos Virgen de Coromoto C.A
				        <br>2. La primera cuota se cobrara a los treinta (30) dias de la firma de este convenio.
				        <br>3. Se cobrara un recargo en caso de cheque devuelto.
				        <br>4. Este convenio no tendra validez si presenta enmienda o datos falsos.
			        </p>
        		</td>
        		<td>
        			<p class="text-cenetr">
        				Aprobado Por<br>
        				Servicios Funerarios y <br>
        				Previsivos Virgen de <br>
        				Coromoto C.A <br>
        				______________________
        			</p>
        		</td>
			</tr>
		</table>
	</body>
</html>