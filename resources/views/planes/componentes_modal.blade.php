<div class="modal fade" id="componentes_modal" tabindex="-1" role="dialog" aria-labelledby="reglaCreateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reglaCreateLabel">Agregar Componente</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'componentes.store']) !!}
           	    
           	    <!-- Componete Field -->
		        <div class="form-group col-sm-12">
		            {!! Form::label('componente', 'Componente:') !!}
		            {!! Form::text('componente', null, ['class' => 'form-control']) !!}
		        </div>

            <input type="hidden" name="planes_id" value="?" id="planes_id">
		            <div class="form-group">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-default']) !!}
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>