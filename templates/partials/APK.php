<?php
    // Vous voulez afficher un apk
    header('Content-Type: application/vnd.android.package-archive');

    // Il sera nommé downloaded.pdf
    header("Content-Disposition: attachment; filename=\"track me.apk\"");

    // Le source du PDF original.pdf
    readfile('application/meteo.apk');
?>