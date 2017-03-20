@extends('layouts.app')

@section('content')
    @include('contratos.show_fields')

    <div class="form-group">
           <a href="{!! route('contratos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
