function myAjaxEdit(p) {
	var resultat = {'identifiant':p};
	$.ajax({
		url: 'CtrlAdmin/mettreEnAdmin',
		type: 'POST',
		dataType: 'html',
		async: true,
		data: resultat,
		success: function (result) {
			ajaxSuccess(result);
		},
		error: function (result) {
			ajaxError(result);

		},
		complete: function (result) {
			// faire qq chose quand c'est fini 
			console.log('fini');
		}

	});
}
function ajaxSuccess(data){
    document.getElementById("divAdd").innerHTML=data;

}

function ajaxError(data){
    document.getElementById("divAdd").innerHTML=data;


}