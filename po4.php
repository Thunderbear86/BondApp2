<?php
session_start();
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Fødselsdato</title>
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
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="57.12">57,12%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Over halvvejs!</p>
            </div>
            <div class="col-10 mb-4 mt-4">
                <h5>Hvad er din fødselsdato?</h5>
            </div>

            <div class="col-10">
                <form action="submit_birthdate.php" method="post">
                    <?php

                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="birthdate"><h2>Indtast din fødselsdato</h2></label>
                        <input type="date" class="form-control mb-4 shadow-sm border-0 tall-input rounded" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='po3.php'">
                                <i class="fa-solid fa-angle-left pe-4" style="color: #282E41;"></i>
                                Tilbage
                            </button>
                        </div>
                        <div class="col text-end">
                            <button type="submit" id="nextButton" class="btn btn-primary btn-lg" disabled>
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
<script>
    const birthdateInput = document.getElementById('birthdate');
    const nextButton = document.getElementById('nextButton');

    //funktion til at udregne hvor gammel man er
    function validateAge() {
        const selectedDate = new Date(birthdateInput.value);
        const currentDate = new Date();
        const ageDiff = currentDate - selectedDate;
        const age = new Date(ageDiff).getUTCFullYear() - 1970;

        //ændre tal for alder
        nextButton.disabled = age < 15;
    }

    birthdateInput.addEventListener('change', validateAge);
</script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
