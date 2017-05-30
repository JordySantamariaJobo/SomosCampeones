$(document).ready(function(){
	$('img').on("error", function () {
		$(this).attr('src',"../libs/img/pagina/default.jpg");
	});
});