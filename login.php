<?php
session_start();
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

</head>
<body>
<main>
        <div class="container">
            <div class="row justify-content-center">
                <img class="mt-5 mb-3 p-0" src="img/TEST%202.png" alt="logo" style="max-width: 50%;">
                <div class="col-10 mb-5">
                    <h1 class="text-center mt-3 mb-3">Login</h1>
                    <form action="submit_login.php" method="post">
                        <div class="form-group">
                            <label for="username">Brugernavn</label>
                            <input type="text" class="form-control mb-4 shadow-sm border-0 rounded" id="username" name="username" placeholder="Brugernavn" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="password">Adgangskode</label>
                            <input type="password" class="form-control mb-4 shadow-sm border-0 rounded" id="password" name="password" placeholder="Adgangskode" required>
                        </div>
                        <div class="row">
                            <div class="col text-start">
                                <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='p1.php'">
                                    <i class="fa-solid fa-angle-left pe-4" style="color: #282E41;"></i>
                                    Tilbage
                                </button>
                            </div>
                            <div class="col text-end">
                                <button type="submit" id="nextButton" class="btn btn-primary btn-lg">
                                    Næste
                                    <i class="fa-solid fa-angle-right ps-4" style="color: #282E41;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</main>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

