<div class="container">

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <img class="col-xs-12 col-sm-offset-7 col-sm-5 col-md-offset-7 col-md-5 col-lg-8 col-lg-offset-4"
             src="<?php echo($_SESSION['avatar']); ?>">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-8">
        <h1><?php echo($_SESSION['prenom']);
            echo " " . ($_SESSION['nom']); ?></h1>
        <h3><?php echo($_SESSION['pseudo']); ?></h3>
    </div>
</div>

<div id="divProfil" class="container-fluid">
    <h1>Profil</h1>
    <br>
    <br>
    <table id="tableProfil" class="table table-hover">
        <tr>
            <td><strong>Nom</strong></td>
            <td><?php echo($_SESSION['nom']); ?></td>
        </tr>
        <tr>
            <td><strong>Prénom</strong></td>
            <td><?php echo($_SESSION['prenom']); ?></td>
        </tr>
        <tr>
            <td><strong>Pseudo</strong></td>
            <td><?php echo($_SESSION['pseudo']); ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo($_SESSION['email']); ?></td>
        </tr>
        <tr>
            <td><strong>Admin</strong></td>
            <td><?php if (($_SESSION['admin']) == 1) {
                    echo "Oui";
                } else {
                    echo "Non";
                }; ?></td>
        </tr>
    </table>

    <a id="divA" class="btn btn-success" href="ctrlGeneral/getParametre/bon" role="button">Modifier</a>

</div>
