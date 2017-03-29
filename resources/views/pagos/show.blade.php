@extends('layouts.app')
@section('title','Pagos')
@section('content')
    @include('pagos.show_fields')
    <div class="row">
    @include('pagos.pagos_modal')
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Ver _MENU_ entradas por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Viendo la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay informacion",
                "search": "Buscar: ",
                "paginate": {
                    "previous": "Anterior ",
                    "next": " Proximo",
                }
            }
        });
    } );
</script> 
<script type="text/javascript">

//Crear Pagos
function pagos(id) {
    var contrato_id = document.getElementById('contrato_id');
    contrato_id.value = id;                
} 

</script>
@endsection