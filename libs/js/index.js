$(document).ready(function(){
	$('img').on("error", function () {
		$(this).attr('src',"libs/img/pagina/default.jpg");
	});
});

/* function ellipsis_box(elemento, max_chars) {
	limite_text = $(elemento).text();
	if (limite_text.length > max_chars) {
		limite = limite_text.substr(0, max_chars)+"...";
		$(elemento).text(limite);
	}
}

$(function() {
	ellipsis_box(".Descripcion", 120);
}); */