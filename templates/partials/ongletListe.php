<script>
function myAjax() {
	$.ajax({
		url: 'ctrlgeneral/getAjoutUser',
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


$( document ).ready(function() { 

$( "#iconEdit" ).click( function () {
  	$.ajax({
		url: 'ctrlGeneral/getEditUser',
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

function ajaxSuccess(data){
    document.getElementById("divAdd").innerHTML=data;

}

function ajaxError(data){
    document.getElementById("divAdd").innerHTML=data;


}
});
});



</script>

<div class="container" >

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <img class="col-xs-12 col-sm-offset-7 col-sm-5 col-md-offset-7 col-md-5 col-lg-8 col-lg-offset-4"
             src="images/Image-1.png">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <h1>Prenom NOM</h1>
        <h3>@Pseudo</h3>
    </div>
</div>




<div  id="divGeneral" class="container" style="background-color: #f2f2f2; padding-bottom: 5%">

    <div id="divListe" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="height: 120vh">

        <h1 id="h1Liste" class="col-lg-offset-1">Liste des utilisateurs</h1>

        <table id="tableListe">
            <tr>
                <th>Pseudo</th>
                <th>Avatar</th>
                <th>Editer</th>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4 col-xs-6">Admin</button>
                    <a id="iconEdit"><span id="edit" class="glyphicon glyphicon-pencil col-xs-1"
                                      aria-hidden="true"></span></a>
                    <a id="iconRemove" data-toggle="modal" data-target="#myModal1" ><span id="remove"  class="glyphicon glyphicon-minus-sign col-xs-1"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4" disabled>Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4" disabled>Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4" disabled>Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4">Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4">Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4" disabled>Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4" disabled>Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4" disabled>Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>
            <tr>
                <td>Elfyka</td>
                <td><img id="imgListe" src="images/Image-1.png"></td>
                <td>
                    <!--<button id="btnModifier" type="button" class="btn btn-default col-sm-4">Modifier</button>-->
                    <button id="btnAdmin" type="button" class="btn btn-default col-sm-4">Admin</button>
                    <a href="#"><span id="edit" class="glyphicon glyphicon-pencil"
                                      aria-hidden="true"></span></a>
                    <a href="#"><span id="remove" class="glyphicon glyphicon-minus-sign"
                                      aria-hidden="true"></span></a>

                </td>
            </tr>

        </table>
    </div>

    <div id="divAdd" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <br><br><br><br><br><br><br><br><br><br>
        <button id="btnAdd" onclick="myAjax()" type="submit" class="btn btn-default col-sm-4 col-sm-offset-4">Ajouter User</button>
    </div>

</div>

 <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Confirmation suppression le compte</h4>
            </div>
            
            <div class="modal-body">
              <p>Voulez vous vraiment supprimez ?</p>
               
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
              <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#confirmation">Oui</button>
            </div>
          </div>
          
        </div>