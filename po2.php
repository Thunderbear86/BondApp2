<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Kode</title>
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
            <div class="col-lg-12">
                <h1>Opret din kode</h1>
                <form action="submit_password.php" method="post">
                    <div class="form-group">
                        <label for="password">Kode</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Vælg din kode">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Bekræft kode</label>
                        <input type="password" class="form-control mb-3" id="confirm_password" name="confirm_password" placeholder="Bekræft din kode">
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
