@extends('layouts.app')
@section('title','Planes')
@section('content')
<div class="col-md-12 panel">           
        <h1 class="pull-left">Planes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('planes.create') !!}">Registrar</a>

        @include('planes.table')

        <div class="row">
        @include('planes.componentes_modal')
        </div>
</div>        
@endsection
@section('scripts')
<script type="text/javascript">

//Crear componente
function componentes(id) {
    var planes_id = document.getElementById('planes_id');
    planes_id.value = id;                
}
</script>
@endsection
