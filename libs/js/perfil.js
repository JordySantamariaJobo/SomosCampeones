function ModalApostar(idpartido){
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "../Model/ApostarPartido.php",
        data: "ID="+idpartido,
        success: function(respuesta){
            $("#myModal").html(respuesta);
        },
        error: function(){
            alert("Al parecer hubo un error, Nuestro equipo ya esta trabajando para arreglar este error");
        }
    });
}