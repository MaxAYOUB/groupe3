<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "templates/partials/head.php"; ?>
<<<<<<< HEAD
    <base href="http://cdi.afpa-balma.fr"/>
=======
>>>>>>> master
</head>

<body style="padding-top:150px;">

<header>
    <?php include "templates/partials/navBar.php"; ?>
    <?php 
    if ($page=="accueilNew.php"){include "templates/partials/bandeau.php";}; ?>
</header>

<main>
    <section>

        <article>

            <?php
            if ($page !== "") {
                include "templates/partials/{$page}";
            } else {
                include "templates/partials/accueilNew.php";
            } ?>

        </article>

        <aside>

        </aside>

    </section>
</main>

<footer>
    <!-- <?php include "templates/partials/footer.php"; ?> -->
</footer>

</body>
</html>
