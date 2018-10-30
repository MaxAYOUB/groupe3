<script>
    function bs_input_file() {
        $(".input-file").before(
            function () {
                if (!$(this).prev().hasClass('input-ghost')) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                    element.attr("name", $(this).attr("name"));
                    element.change(function () {
                        element.next(element).find('input').val((element.val()).split('\\').pop());
                    });
                    $(this).find("button.btn-choose").click(function () {
                        element.click();
                    });
                    $(this).find("button.btn-reset").click(function () {
                        element.val(null);
                        $(this).parents(".input-file").find('input').val('');
                    });
                    $(this).find('input').css("cursor", "pointer");
                    $(this).find('input').mousedown(function () {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    }

    $(function () {
        bs_input_file();
    });
</script>
<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>

<div class="container">

    <div id="divCompteAvatar" class="col-xs-5 col-sm-4 col-md-4 col-lg-3">
      <img id="compteAvatar" class="col-xs-6 col-sm-offset-3 col-sm-5 col-md-offset-5 col-md-4 col-lg-7 col-lg-offset-5"
           src="<?php  echo ($_SESSION['avatar']); ?>">
  </div>

    <div  class=" col-xs-7 col-sm-6 col-md-6 col-lg-8">
        <h1 id ="nomID"><?php echo ($_SESSION['nom']);echo " ".($_SESSION['prenom']);?></h1>
        <h3 id ="pseudoID"><?php echo ($_SESSION['pseudo']);?></h3>
    </div>
</div>


<div class="container-fluid" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 5%;background-color: #f2f2f2;">

    <h1 id="h1Galerie">Galerie d'avatars</h1>

    <div id="divGalerie" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php
        // $avatar = ($database['avatar']);
        for ($i = 0; $i < sizeof($_SESSION['listeAvatar']); $i++) {
            $slug = $_SESSION['listeAvatar'][$i]['slug_avatar'];
            // var_dump($slug);
            echo "<img name='avatar' id='{$slug}' onclick='enrgAvatar(\"{$slug}\")'style='cursor:pointer; margin:3px ' src='{$_SESSION['listeAvatar'][$i]['avatar']}'</br>";
        }
        ?>

    </div>
    <div id="divGalerieBtn" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="btn2" type="button" class="btn btn-default col-xs-4 col-xs-offset-1 col-sm-2 col-sm-offset-3"
                data-toggle="modal" data-target="#myModal1">Supprimer
        </button>
        <button id="btn1" type="button" class="btn btn-success col-xs-4 col-xs-offset-2 col-sm-2 col-sm-offset-2"
                data-toggle="modal" data-target="#myModal">Ajouter
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Uploader avatar</h4>
            </div>

            <div>
                <div class="modal-body">
                    <label for="mon_fichier">Image (JPG ou PNG| max. 1 Mo) :</label><br/>
                    <form method="POST" action="reception.php" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                        <input type="hidden" name="MAX_WIDTH_SIZE" value="300"/>
                        <input type="hidden" name="MAX_HEIGHT_SIZE" value="300"/>

                        <!-- COMPONENT START -->
                        <div class="form-group">
                            <div class="input-group input-file" name="mon_fichier">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Choisir</button>
                                        </span>
                                <input style="margin-bottom:9px " type="text" class="form-control"
                                       placeholder='Choisir votre fichier...'/>
                                <span class="input-group-btn">
                                            <button class="btn btn-warning btn-reset" type="button">Reset</button>
                                        </span>
                            </div>
                        </div>
                        <!-- COMPONENT END -->


                    </form>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation suppression d'avatar</h4>
            </div>

            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer ?</p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#confirmation">Oui
                </button>
            </div>
        </div>

    </div>
</div>