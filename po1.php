<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Profilnavn</title>
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
        <div class="row">
            <div class="col-lg-12">
                <p class="mb-3">Opret din profil og start dit møde</p>
                <form action="submit_username.php" method="post">
                    <div class="form-group">
                        <label for="inputProfilNavn"><h1>Profilnavn</h1></label>
                        <input type="text" class="form-control mb-3" id="inputProfilNavn" name="username" placeholder="Profilnavn">
                    </div>
                    <button type="submit" class="btn btn-primary">Frem</button>
                </form>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php include "includes/footer.php";?>
</footer>

<script src="js/main.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
