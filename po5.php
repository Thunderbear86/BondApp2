<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Lokation</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <!-- Header content -->
</header>
<nav>
    <?php include "includes/nav.php";?>
</nav>

<main>
    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" width="100" height="100">
            <div class="col-lg-12">
                <h1>Indtast din lokation</h1>
                <form action="submit_location.php" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                        echo '<input type="hidden" name="username" value="' . $_SESSION['username'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="location">Lokation (By)</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Indtast din by">
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='po4.php'">Tilbage</button>
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
