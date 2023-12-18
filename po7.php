<?php
session_start();
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - MitID Bekræftelse</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <img class="mt-5 mb-3 p-0" src="img/TEST%202.png" alt="logo" style="max-width: 50%;">
            <div class="col-10 mb-2">
                <h3>Profiloprettelse</h3>
            </div>
            <div class=" col-10 mb-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="99">99%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Perfekt! Nu mangler vi bare...</p>
            </div>
            <div class="col-10">
                <h1>MitID Bekræftelse</h1>
                <img src="img/MitID.jpg" alt="MitID Placeholder" class="img-fluid mb-3">
                <div class="row">
                    <div class="col text-start">
                        <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='po6.php'">
                            <i class="fa-solid fa-angle-left pe-4" style="color: #282E41;"></i>
                            Tilbage
                        </button>
                    </div>
                    <div class="col text-end">
                        <button type="submit" id="nextButton" class="btn btn-primary btn-lg" onclick="window.location.href='p1.php'">
                            Næste
                            <i class="fa-solid fa-angle-right ps-4" style="color: #282E41;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php include "includes/footer.php";?>
</footer>

<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
