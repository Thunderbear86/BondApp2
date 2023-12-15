<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Køn</title>
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
                <h1>Vælg dit køn</h1>
                <form action="submit_gender.php" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="gender">Køn</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Vælg...</option>
                            <option value="Mand">Mand</option>
                            <option value="Kvinde">Kvinde</option>
                            <option value="Andet">Andet</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='po5.php'">Tilbage</button>
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
