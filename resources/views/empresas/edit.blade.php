@extends('layouts.app')
@section('title','Editar Empresa')
@section('css')
 <script type="text/javascript">
    $(document).ready(function(){
        $('#estado_id').change(function(){
            $.get("{!! route('dropdown') !!}",
            { option: $(this).val() },
            function(data) {
                $('#municipio_id').empty();
                $.each(data, function(key, element) {
                    $('#municipio_id').append("<option value='" + element.id + "'>" + element.municipio + "</option>");
                });
            });
        });
    });     
    </script>
@endsection
@section('content')
        <div class="col-md-12 panel">   
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="pull-left">Editar Empresa</h1>
                </div>
            </div> 
            <div class="row">
                {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'patch']) !!}

                @include('empresas.fields')

                {!! Form::close() !!}
            </div>
        </div>
@endsection
