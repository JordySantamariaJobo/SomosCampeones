function update(slider,val) {
    var $amount = slider == 1?val:$("#amount").val();
    var $duration = slider == 2?val:$("#duration").val();
    var $checked = $('input:radio[name=optionsRadios]:checked').val();
    $total = "$" + ($amount * $duration);
    $( "#amount" ).val($amount);
    $( "#amount-label" ).html("<strong><center>Si ganas conseguiras: "+Math.round((($amount*$checked)-$amount))+" Puntos</center></strong>");
    $("#InputPuntosApostar").val($amount);
    $( "#duration" ).val($duration);
    $( "#duration-label" ).text($duration);
    $( "#total" ).val($total);
    $( "#total-label" ).text($total);
    $('#slider a').html('<label><span class="fa fa-angle-left" style="color:#fff"></span> '+$amount+' <span class="fa fa-angle-right" style="color:#fff"></span></label>');
    $('#slider2 a').html('<label><span class="fa fa-angle-left" style="color:#fff"></span> '+$duration+' <span class="fa fa-angle-right" style="color:#fff"></span></label>');
}