<div class="modal fade" id="beneficiarios" tabindex="-1" role="dialog" aria-labelledby="reglaCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reglaCreateLabel">Agregar Beneficiario</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'personas.store']) !!}
                   	<!-- Nombre Field -->
		            <div class="form-group col-sm-6">
		                {!! Form::label('nombre', 'Nombre:') !!}
		                {!! Form::text('nombre', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo']) !!}
		            </div>

		            <!-- Apellido Field -->
		            <div class="form-group col-sm-6">
		                {!! Form::label('apellido', 'Apellido:') !!}
		                {!! Form::text('apellido', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{4,30}', 'placeholder' => 'Nombre Completo']) !!}
		            </div>

		            <!-- Cedula Field -->
		            <div class="form-group col-sm-6">
		                {!! Form::label('cedula', 'Cedula:') !!}
		                {!! Form::text('cedula', null, ['class' => 'form-control','pattern' => '[0-9]{7,8}', 'placeholder' => 'Solo Numeros']) !!}
		            </div>

		            <!-- Sexo Field -->
		            <div class="form-group col-sm-3">
		                {!! Form::label('sexo', 'Masculino:') !!}
		                <input class="form-control radio" type="radio" name="sexo" checked value="Masculino">
		            </div>
		            <div class="form-group col-sm-3">    
		                {!! Form::label('sexo', 'Femenino:') !!} 
		                <input class="form-control radio" type="radio" name="sexo" value="Femenino"> 
		            </div>

		            <!-- Fecha Nac Field -->
		            <div class="form-group col-sm-6">
		                {!! Form::label('fecha_nac', 'Fecha de Nacimiento:') !!}
		                {!! Form::text('fecha_nac', null, ['class' => 'form-control','id' => 'fecha_nacimiento','placeholder' => 'DD/MM/AAAA']) !!}
		            </div>

		            <!-- telefono Nac Field -->
		            <div class="form-group col-sm-6">
		                {!! Form::label('telefono', 'Telefono:') !!}
		                {!! Form::text('telefono', null, ['class' => 'form-control','pattern' => '[0-9]{11}', 'placeholder' => 'Solo Numeros']) !!}
		            </div>


		            <!-- parentesco Field -->
		            <div class="form-group col-sm-12">
		                {!! Form::label('parentesco', 'Parentesco con el titular:') !!}
		                <select class="form-control" name="parentesco">
		                	<option value="Madre">Madre</option>
		                	<option value="Padre">Padre</option>
		                	<option value="Hijo">Hijo</option>
		                	<option value="Hermano">Hermano</option>
		                	<option value="Conyuge">Conyuge</option>
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