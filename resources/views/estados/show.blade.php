@extends('layouts.app')

@section('content')
    @include('estados.show_fields')

    <div class="form-group">
           <a href="{!! route('estados.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
