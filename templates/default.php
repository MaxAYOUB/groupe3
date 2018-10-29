<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "templates/partials/head.php"; ?>
</head>

<body style="padding-top:150px;">

<header>
    <?php 
    if (isset($_SESSION['connecte']) && $_SESSION['connecte']==true){
        include "templates/partials/navBarConnect.php";
    }else{
        include "templates/partials/navBar.php"; 
    }
    ?>
    <?php 
    if ($_SESSION['page']=="accueilNew.php"){include "templates/partials/bandeau.php";}; ?>
</header>

<main>
    <section>

        <article id="article">

            <?php
            if (isset($_SESSION['page']) && $_SESSION['page'] !== "") {
                include "templates/partials/{$_SESSION['page']}";
            } else {
                include "templates/partials/accueilNew.php";
            } ?>

        </article>

        <aside>

        </aside>

    </section>
</main>

<footer>
    <?php include "templates/partials/footer.php"; ?>
</footer>

</body>
</html>
