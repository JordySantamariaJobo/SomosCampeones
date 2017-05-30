function Login() {
    if($("#txtmail").val().indexOf('@', 0) == -1 || $("#txtmail").val().indexOf('.', 0) == -1){ alert("Debes de ingresar tu correo electronico"); }
    else{
        if($("#txtpwd").val() == ""){ alert("Debes de ingresar tu contraseña"); }
        else{
            var mail = $('#txtmail').val();
            var pwd = $('#txtpwd').val();
            var ajax_data = {
                "correo": mail,
                "pwd": pwd
            };
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url: "../controlador/Login.php",
                data: ajax_data,
                success: function(result){
                    if (result == "Error"){
                        $("#fail").html("<div class='alert alert-danger P5' role='alert'>Al parecer tu correo o contrase&ntildea son incorrectos, verificalos de nuevo...</div>");
                    } else{
                        location.href = '../index.php';
                    }
                },
                error: function(){ $("#fail").html("<div class='alert alert-danger P5' role='alert'>Al parecer hubo un error, Nuestro equipo ya esta trabajando para arreglar este error</div>"); }
            });
        }
    }            
}

function CerrarSesion(){
    $.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "../controlador/DestruirSesion.php",
        data: null,
        success: function(){ location.reload(); },
        error: function(){ alert("Al parecer algo salio mal :("); }
    });
}