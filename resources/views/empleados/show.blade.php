@extends('layouts.app')

@section('content')
    @include('empleados.show_fields')

    <div class="form-group">
           <a href="{!! route('empleados.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
