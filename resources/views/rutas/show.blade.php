@extends('layouts.app')

@section('content')
	    <DIV class="col-md-12 panel">

    @include('rutas.show_fields')
    <div class="form-group">
           <a href="{!! route('rutas.index') !!}" class="btn btn-default">Back</a>
    </div>
    </DIV>
@endsection
