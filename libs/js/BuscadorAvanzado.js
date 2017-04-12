$("#BuscadorAvanzado").focus(function(){
  	$("#WallWhiteNews").fadeOut(1000);
  	$("#ResultadosBuscador").fadeIn(1000);
   	$("#ResultadosBuscador").html("<br><br><center><h3 class='M4'>Busca articulos, noticias de tu equipo, jugador favorito o liga, vamos intentalo! <i class='fa fa-futbol-o'></i></h3></center><br><br>");
});

$("#BuscadorAvanzado").focusout(function(){
  	if ($("#BuscadorAvanzado").val() == "") {
  		$("#WallWhiteNews").fadeIn(1000);
   		$("#ResultadosBuscador").fadeOut(1000);
   	}
});

$("#BuscadorAvanzado").keyup(function(){
   	var PalabrasBuscador = $("#BuscadorAvanzado").val();
    var Lugar = 0;
  	var ajax_data = { "palabraBuscador" : PalabrasBuscador, "lugar" : Lugar };
   	$.ajax({
   	    async: true,
    	type: "POST",
    	dataType: "html",
    	contentType: "application/x-www-form-urlencoded",
    	url: "../controlador/BuscadorAvanzado.php",
    	data: ajax_data,
    	success: function(result) { 
            $("#ResultadosBuscador").html(result); 
        },
    	error: function() { 
            BuscadorAvanzadoInicio(); 
        }
	});	
});

function BuscadorAvanzadoInicio(){
    var PalabrasBuscador = $("#BuscadorAvanzado").val();
    var Lugar = 1;
    var ajax_data = { "palabraBuscador" : PalabrasBuscador, "lugar" : Lugar };
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "controlador/BuscadorAvanzado.php",
        data: ajax_data,
        success: function(result) { 
            $("#ResultadosBuscador").html(result); 
        },
        error: function() { 
            console.log("Error 404"); 
        }
    });
}