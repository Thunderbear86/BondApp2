<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Om Mig</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<main>
    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" style="max-width: 100px; max-height: 100px;">
            <div class="col-lg-12">
                <h1>Fortæl lidt om dig selv</h1>
                <form action="submit_about.php" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="aboutUser">Om Mig</label>
                        <textarea class="form-control" id="aboutUser" name="aboutUser" rows="4" placeholder="Noget om dig selv..." required></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='po7.php'">Tilbage</button>
                    <button type="submit" class="btn btn-primary">Næste</button>
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
