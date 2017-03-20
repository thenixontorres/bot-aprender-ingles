@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit pago</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($pago, ['route' => ['pagos.update', $pago->id], 'method' => 'patch']) !!}

            @include('pagos.fields')

            {!! Form::close() !!}
        </div>
@endsection
