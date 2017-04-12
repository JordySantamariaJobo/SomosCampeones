//Script de Validacion de los datos del registro de Usuario
$("#checkacepto").click(function() {
    if($("#checkacepto").is(':checked')) {
        if($("#user").val() == ""){
            alert("Debes de Agregar tu Nombre");
            $("#checkacepto").removeAttr('checked');
        }
        else{
            if($("#mail").val().indexOf('@', 0) == -1 || $("#mail").val().indexOf('.', 0) == -1){
                alert('El correo electrónico introducido no es correcto.');
                $("#checkacepto").removeAttr('checked');
                }
            else{
                if($("#pwd").val() == ""){
                    alert("Debes de Agregar una Contrasena");
                    $("#checkacepto").removeAttr('checked');
                    }
                else{
                    if($("#fec").val() == "0000-00-00"){
                        alert("Debes de introducir tu fecha de nacimiento");
                        $("#checkacepto").removeAttr('checked');
                    }
                    else{
                        if($("#dropteam").val() == 0){
                            alert("Debes de elegir un equipo favorito");
                            $("#checkacepto").removeAttr('checked');
                        }
                        else{
                            $('#regisuser').removeAttr("disabled");
                        }
                    }
                }
            }
        }
    }
else {  
    $('#regisuser').attr('disabled','disabled');
    }
});

