<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Email</title>
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
        <div class="row justify-content-center mb-4">
            <img src="img/LOGO.png" alt="logo" style="max-width: 100px; max-height: 100px;">
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Profiloprettelse</p>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p>Næsten halvvejs!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1>Indtast din email</h1>
                <form action="submit_email.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?php
                        session_start();
                        if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
                            echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                            echo '<input type="hidden" name="username" value="' . $_SESSION['username'] . '">';
                        }
                        ?>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Din email">
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='po3.php'">Tilbage</button>
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
