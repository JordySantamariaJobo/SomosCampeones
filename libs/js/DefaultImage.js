$(document).ready(function(){
	$('img').on("error", function () {
		$(this).attr('src',"../assets/img/pagina/default.jpg");
	});
});