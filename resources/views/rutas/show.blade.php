@extends('layouts.app')

@section('content')
    @include('rutas.show_fields')

    <div class="form-group">
           <a href="{!! route('rutas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
