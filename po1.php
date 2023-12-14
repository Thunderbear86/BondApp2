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
        <div class="row justify-content-center mb-4">
            <img src="img/LOGO.png" alt="logo" style="max-width: 100px; max-height: 100px;">
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Profiloprettelse</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 14%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <p>Profiloprettelse</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 14%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-3">
                <p class="mb-3">Lad os oprette din profil...</p>
                <form action="submit_username.php" method="post">
                    <div class="form-group">
                        <label for="inputProfilNavn"><h1>Profilnavn</h1></label>
                        <input type="text" class="form-control mb-3" id="inputProfilNavn" name="username" placeholder="Profilnavn">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='po2.php'">Næste</button>
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
