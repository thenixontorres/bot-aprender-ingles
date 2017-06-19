@extends('layouts.app')
@section('title','Editar Persona')
@section('css')
    <!-- jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.structure.css') }}">

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
                <h1 class="pull-left">Editar Persona</h1>
            </div>
        </div>
        <div class="row">
            {!! Form::model($persona, ['route' => ['personas.update', $persona->id], 'method' => 'patch']) !!}

            @include('personas.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">

//Crear Beneficiario
function beneficiarios(id) {
    var contrato_id = document.getElementById('contrato_id');
    contrato_id.value = id;                
} 

</script>
<!--Jqueyui -->
    <script src="{{ asset('plugins/jqueryui/jquery-ui.js') }}"></script>
    <script type="text/javascript">
          $(function() {
            $( "#fecha_nacimiento" ).datepicker({
                dateFormat: "dd/mm/yy",
            });
          });
    </script> 
@endsection
