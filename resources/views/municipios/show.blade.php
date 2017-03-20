@extends('layouts.app')

@section('content')
    @include('municipios.show_fields')

    <div class="form-group">
           <a href="{!! route('municipios.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
