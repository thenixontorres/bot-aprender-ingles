@extends('layouts.app')

@section('content')
    @include('planes.show_fields')

    <div class="form-group">
           <a href="{!! route('planes.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
