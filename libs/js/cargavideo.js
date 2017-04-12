function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	var tit = $("#titulo_video").val();
	var desc = $("#desc_video").val();
	var formdata = new FormData();
	formdata.append("file1", file);
	formdata.append("titulo_video", tit);
	formdata.append("desc_video", desc);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "../Model/SubirVideo.php");
	ajax.send(formdata);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	$("#progressBar").width(Math.round(percent)+"%");
	_("status").innerHTML = Math.round(percent)+"% subiendo... por favor espera...";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Ups! al parecer hubo un error";
}
function abortHandler(event){
	_("status").innerHTML = "Carga abortada";
}