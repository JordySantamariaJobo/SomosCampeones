function EnviarMensaje(){
        var msj = $("#MensajePrensa").val();
        if (msj == "") {
          alert("Ups! Al parecer el mensaje que tratas de enviar se encuentra vacio, escribe algo para que podamos enviarlo... :)");
        }
        else{
          $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../Model/RegistrarComentarioNoticia.php",
            data: "msj="+msj,
            success: function(){
                location.reload();
            },
            error: function(){
                console.log("ERROR");
            }
          });
        }
    }
    function MeGusta(){
    	var dec = 1;
          $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../Model/Gustar.php",
            data: "dec="+dec,
            success: function(result){
                if (result == 1) { location.reload(); }
            },
            error: function(){
                alert("ERROR");
            }
          });
    }

    function NoMeGusta(){
    	var dec = 0;
          $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../Model/Gustar.php",
            data: "dec="+dec,
            success: function(result){
                if(result == 0){ location.reload(); }
            },
            error: function(){
                alert("ERROR");
            }
          });
    }