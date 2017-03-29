<div class="modal fade" id="pagos_modal" tabindex="-1" role="dialog" aria-labelledby="reglaCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reglaCreateLabel">Registrar Pago</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'pagos.store']) !!}
                   	<!-- Monto Field -->
			<div class="form-group col-sm-12">
			    {!! Form::label('monto', 'Monto:') !!}
			    {!! Form::text('monto', null, ['class' => 'form-control','pattern' => '[0-9]{1,30}', 'placeholder' => 'Solo Numeros']) !!}
			</div>

			<!-- Numero Cuota Field -->
			<div class="form-group col-sm-12">
			    {!! Form::label('numero_cuota', 'Numero de Cuota:') !!}
			    <select class="form-control" name="numero_cuota">
				@for ($i=0; $i < $cuotas; $i++)
					<option value="{{ $i+1 }}"> {{ $i+1 }} </option>
				@endfor	
			    </select> 
			</div>

			<!-- Tipo Pago Field -->
			<div class="form-group col-sm-12">
			    {!! Form::label('tipo_pago', 'Tipo de Pago:') !!}
			    <select class="form-control" name="tipo_pago">
					<option value="Banco"> Banco </option>
					<option value="Oficina"> Oficina </option>
			    </select> 
			</div>

		            <!--contrato_id field -->
                    <div class="form-group">
                         <input class="form-control" required="required" name="contrato_id" type="hidden" id="contrato_id" value="?">
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-default']) !!}
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>