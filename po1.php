<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Opret Profil - Profilnavn</title>

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

<main>

    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" width="100" height="100">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Opret din profil og start dit møde</p>

                <br>



                <form action="opretlog.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail"><h1>Profilnavn</h1></label>

                        <input type="#" class="form-control" id="#" name="#" placeholder="Profilnavn">

                    </form>
            </div>
        </div>
    </div>
                <button type="#" class="btn btn-primary">Tilbage</button>
                <button type="#" class="btn btn-primary">Frem</button>


<footer>
    <?php include "includes/footer.php";?>
</footer>

<script src="js/main.js"></script>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

