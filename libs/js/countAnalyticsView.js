//$(document).ready(function(){ if ($("#myAd").height() == 0) { $("#ModalAdsBlock").modal("show"); } });
function count(url, ipUser){
    url = window.atob(url);
    ipUser = window.atob(ipUser);
	var ajax_data = {
		"url" : url,
		"ip" : ipUser
	};
	$.ajax({
        async: true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url: "../Model/VisitaUserIP.php",
        data: ajax_data,
        success: function(result){},
        error: function(){ console.log("Error 404 Not Found ACU"); }
    });
};

//Generador de Modales
/*$(document).ready(function(){
    var Numero = Math.floor(Math.random() * 5);
    if (Numero > 0 && Numero <= 4){
        switch(Numero){
            case 1: 
                $("#ModalFacebook").modal("show");
                break;
            case 2:
                $("#ModalYouTube").modal("show");
                break;
            case 3:
                $("#ModalTwitter").modal("show");
                break;
            case 4:
                $("ModalWhats").modal("show");
                break;
        }
    }
});*/

/*$("#PincheAdSense").click(function(){ 
    //$("#ad_iframe").trigger("click");
    $("#ad_iframe").on("click", function(){
        $("a").trigger("click");
    }); 
});*/