function myAjaxEdit() {
	$.ajax({
		url: 'CtrlAdmin/afficherListeUtilisateur',
		type: 'POST',
		dataType: 'html',
		async: true,
		data: "",
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