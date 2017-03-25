@extends('layouts.app')

@section('content')
    @include('componentes.show_fields')

    <div class="form-group">
           <a href="{!! route('componentes.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
