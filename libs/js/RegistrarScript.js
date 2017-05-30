//Script de Validacion de los datos del registro de Usuario
$(".checkacepto").click(function() {
    if($(".checkacepto").is(':checked')) {
        if($("#user").val() == ""){
            alert("Debes de Agregar tu Nombre");
            $(".checkacepto").removeAttr('checked');
        }
        else{
            if($("#mail").val().indexOf('@', 0) == -1 || $("#mail").val().indexOf('.', 0) == -1){
                alert('El correo electrónico introducido no es correcto.');
                $(".checkacepto").removeAttr('checked');
            }
            else{
                if($("#pwd").val() == ""){
                    alert("Debes de Agregar una Contrasena");
                    $(".checkacepto").removeAttr('checked');
                }
                else{
                    if($("#fec").val() == "0000-00-00"){
                        alert("Debes de introducir tu fecha de nacimiento");
                        $(".checkacepto").removeAttr('checked');
                    }
                    else{
                        if($("#dropteam").val() == 0){
                            alert("Debes de elegir un equipo favorito");
                            $(".checkacepto").removeAttr('checked');
                        }
                        else{
                            if ($(".InputFormControl").attr("id") == "inputError1") {
                                alert("El nombre de Usuario que seleccionaste ya esta ocupado");
                                $(".checkacepto").removeAttr('checked');
                            }
                            else{
                                if($("#pwd").val() != $("#reppwd").val()){
                                    alert("La contrasena es incorrecta");
                                    $(".checkacepto").removeAttr('checked');
                                }
                                else{
                                    $('#regisuser').removeAttr("disabled");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    else { $('#regisuser').attr('disabled','disabled'); }
});

$(".InputFormControl").keyup(function(){
    var valor = $(".InputFormControl").val();
    var ajax_data = {
        "Valor": valor
    };
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "../Model/NombreUsuario.php",
        data: ajax_data,
        success: function(respuesta){
            if (respuesta == 0) {
              $("#FormGroup").removeClass();
              $("#FormGroup").addClass("form-group has-success");
              $(".InputFormControl").attr("id","inputSuccess1");
              $("#helpBlock2").html("DISPONIBLE <i class='fa fa-check'></i>");
            }
            else if(respuesta == 1) {
              $("#FormGroup").removeClass();
              $("#FormGroup").addClass("form-group has-error");
              $(".InputFormControl").attr("id","inputError1");
              $("#helpBlock2").html("NO DISPONIBLE <i class='fa fa-close'></i>");
            }
        },
        error: function(){
            alert("Al parecer hubo un error, Nuestro equipo ya esta trabajando para arreglar este error");
        }
    });
});