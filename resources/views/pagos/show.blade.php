@extends('layouts.app')

@section('content')
    @include('pagos.show_fields')

    <div class="form-group">
           <a href="{!! route('pagos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
