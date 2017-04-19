@extends('layouts.app')
@section('title','Municipios')

@section('content')
    <div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Editar nuevo Municipio</h1>
        </div>
    </div>    
        <div class="row">
            {!! Form::model($municipio, ['route' => ['municipios.update', $municipio->id], 'method' => 'patch']) !!}

            <!-- Municipio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('municipio', 'Municipio:') !!}
    {!! Form::text('municipio', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('estado_id', 'Estado:') !!}
        <select class="form-control" name="estado_id">
            @foreach($estados as $estado)
                @if ($municipio->estado_id == $estado->id)
                <option selected value="{{ $estado->id }}">
                     {{ $estado->estado }}   
                </option>    
                @else 
                <option value="{{ $estado->id }}">
                     {{ $estado->estado }}   
                </option>
                @endif    
            @endforeach
        </select>
    </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('municipios.index') !!}" class="btn btn-default">Cancelar</a>
</div>


            {!! Form::close() !!}
        </div>
    </div>      
@endsection
