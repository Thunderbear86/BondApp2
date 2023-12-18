<?php
session_start();
?>

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
        <div class="row justify-content-center">
            <img class="mt-5 mb-3 p-0" src="img/TEST%202.png" alt="logo" style="max-width: 50%;">
            <div class="col-10 mb-2">
                <h3>Profiloprettelse</h3>
            </div>
            <div class=" col-10 mb-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="" aria-valuemax="100" style="width: 0" data-progress="85.68">85,68%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Næsten i mål!</p>
            </div>
            <div class="col-10 mb-4 mt-4">
                <h5>Hvad er dit køn?</h5>
            </div>
            <div class="col-10">
                <form action="submit_gender.php" method="post">
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="gender"><h2>Vælg dit køn</h2></label>
                        <select class="form-control mb-4 shadow-sm border-0 tall-input rounded" id="gender" name="gender" required>
                            <option value="">Tryk for at vælge</option>
                            <option value="Mand">Mand</option>
                            <option value="Kvinde">Kvinde</option>
                            <option value="Andet">Andet/nonbinær</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='po5.php'">
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
    const genderSelect = document.getElementById('gender');
    const nextButton = document.getElementById('nextButton');

    //tjekker for om nogle af kønene er blevet valgt
    function validateGenderSelection() {
        let selectedGender = genderSelect.value;
        nextButton.disabled = selectedGender === '';
    }

    genderSelect.addEventListener('change', validateGenderSelection);
</script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
