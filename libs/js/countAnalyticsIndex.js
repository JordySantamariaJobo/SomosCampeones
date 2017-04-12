//$(document).ready(function(){ if ($("#myAd").height() == 0 ) { $("#ModalAdsBlock").modal("show"); } });
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
        url: "Model/VisitaUserIP.php",
        data: ajax_data,
        success: function(result){},
        error: function(){ console.log("Error 404 Not Found ACU"); }
    });
};