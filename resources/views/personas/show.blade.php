@extends('layouts.app')
@section('title','Editar Beneficiarios')
@section('css')
    <!-- jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqueryui/jquery-ui.structure.css') }}">
@endsection
@section('content')
<div class="col-md-12 panel">   
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Editar Beneficiarios</h1>
        </div>
    </div>
    <div class="row">
	@include('personas.show_fields')
	</div>
</div>    	

@endsection
@section('scripts')
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
