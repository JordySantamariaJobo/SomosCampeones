//Funcion que otorga su bonus diario al usuario
function Correcto(){
	$.ajax({
    	async: true,
    	type: "POST",
    	dataType: "html",
    	contentType: "application/x-www-form-urlencoded",
    	url: "../Model/BonusDiario.php",
    	data: null,
    	success: function(){
    		location.reload();
    	},
    	error: function(){
        	$("#ErrorSystem").modal("show");
    	}
	})	
};

//Modal que se despliega para obtener el bonus diario
$(document).ready(function(){ $("#mostrarmodal").modal("show"); });

//Script para realizar la apuesta
function Apostar(idPartido) { 
    var equipo = $('input:radio[name=optionsRadios]:checked').val();
    var puntos = $('#InputPuntosApostar').val();
    if(puntos < 1){
        alert("No puedes apostar 0 puntos, favor de cambiar la cantidad");
    }else{
        $('#botonApostar').attr("disabled", true);
        var ajax_data = {
            "equipo"     : equipo,
            "puntos"   : puntos,
            "idPartido" : idPartido
        };
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../Model/ConfirmarApuesta.php",
            data: ajax_data,
            success: function(){
                location.reload();
            },
            error: function(){
                alert("Al parecer hubo un error, Nuestro equipo ya esta trabajando para arreglar este error");
            }
        });
    }
};

//Apostar todo
function ApuestoTodo(idPartido, puntos) {  
    var equipo = $('input:radio[name=optionsRadios]:checked').val();
    var ajax_data = {
        "equipo"     : equipo,
        "puntos"   : puntos,
        "idPartido" : idPartido
    };
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "../Model/ConfirmarApuesta.php",
        data: ajax_data,
        success: function(respuesta){
            alert(respuesta);
            location.reload();
        },
        error: function(){
            alert("Al parecer hubo un error, Nuestro equipo ya esta trabajando para arreglar este error");
        }
    });
}