var sel_estado = $("#sel_estado");
var sel_ciudad = $("#sel_ciudad");

$('.new').chosen({
		placeholder_text_multiple: 'Seleccione'
	});

$(document).ready(function()
{
	
	$('#sel_pais').change(function()
	{
		var pais_id = $('#sel_pais').val();
		var route = app_path + "estados/filtrar_pais/" + pais_id;	
		sel_estado.empty();
		sel_ciudad.empty();
		sel_estado.append("<option value=''>Estados</option>");
		$.get(route, function(res){
			$(res).each(function(key,value){			
				sel_estado.append("<option value = "+value.id + ">" + value.estado + "</option>");
			});
		});
	});

	$('#sel_estado').change(function()
	{
		var estado_id = $('#sel_estado').val();
		var route = app_path + "ciudades/filtrar_estado/" + estado_id;	
		sel_ciudad.empty();
		sel_ciudad.append("<option value=''>Ciudades</option>");
		$.get(route, function(res){
			$(res).each(function(key,value){
				sel_ciudad.append("<option value=" + value.id + ">" + value.ciudad + "</option>");
			});
		});
	});
});

