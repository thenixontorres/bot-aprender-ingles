@extends('layouts.app')

@section('content')
    @include('clausulas.show_fields')

    <div class="form-group">
           <a href="{!! route('clausulas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
