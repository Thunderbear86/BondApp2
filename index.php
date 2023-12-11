<?php
require "settings/init.php";

$bound = $db->sql("SELECT * FROM bounds");

foreach ($bounds as $bound) {
    echo $bound->boundName . "<br>";
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Bond - Dating med mening</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<header>

</header>
<nav>
    <?php include "includes/nav.php";?>
</nav>
<aside></aside>
<main>
    <article>
        <figure>
            Login/Opret funktion
        </figure>
        <p>Login eller opret profil</p>
    </article>
    <section>Knap</section>
</main>
<footer>
    <?php include "includes/footer.php";?>
</footer>

<script src="js/main.js"></script>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

