<?php
session_start();
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Profilbillede</title>
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
                <h3>Profiludfyldelse</h3>
            </div>
            <div class=" col-10 mb-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="80">80%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Fantastisk! Nu er vi også snart færdige!</p>
            </div>
            <div class="col-10 mb-4 mt-4">
                <h5></h5>
            </div>
            <div class="col-10">
                <form action="submit_picture.php" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="profilePicture"><h2>Upload dit profilbillede</h2></label>
                        <input type="file" class="form-control mb-4 shadow-sm border-0 rounded" id="profilePicture" name="profilePicture" required>
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='p3.php'">
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

<footer>
    <?php include "includes/footer.php";?>
</footer>
<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
