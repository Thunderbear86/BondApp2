<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Interesser</title>
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
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="40">40%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Stærkt! Næsten halvvejs!</p>
            </div>
            <div class="col-10 mb-4 mt-4">
                <h5>Vælg midst 5 interesser</h5>
            </div>
            <div class="col-10">
                <form action="submit_interests.php" method="post">
                    <?php
                    require "settings/init.php";
                    session_start();

                    // Fetch interests from the database
                    $interests = $db->sql("SELECT * FROM interests");
                    foreach ($interests as $interest) {
                        echo '<div class="form-check">';
                        echo '<input class="form-check-input" type="checkbox" name="interests[]" value="' . $interest->interestsId . '" id="interest' . $interest->interestsId . '">';
                        echo '<label class="form-check-label" for="interest' . $interest->interestsId . '">' . $interest->interestsName . '</label>';
                        echo '</div>';
                    }

                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
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

<footer>
    <?php include "includes/footer.php";?>
</footer>
<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
