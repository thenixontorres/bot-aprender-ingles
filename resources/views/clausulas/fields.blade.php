<!-- Clausulas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clausulas', 'Clausulas:') !!}
    {!! Form::text('clausulas', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clausulas.index') !!}" class="btn btn-default">Cancel</a>
</div>
