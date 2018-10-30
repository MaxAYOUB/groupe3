<!DOCTYPE html>
<html lang="en"  style="height: 100%; margin: 0; padding: 0;">

<head>
    <?php include "templates/partials/head.php"; ?>
</head>

<body style="margin: 0; padding: 150px 0 60px 0; height: 100%; position: relative; display : table; width: 100%;">

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
