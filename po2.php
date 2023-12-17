<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Kode</title>
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
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="28.56">28.56%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Du starter stærkt ud!</p>
            </div>
            <div class="col-10 mt-4">
                <h5>Hvad skal din kode være?</h5>
                <p class="opacity-50">husk: MINDST 1 tal og 1 stort bogstav, 8 karaterer lang, og uden mellemrum</p>
            </div>
                <div class="col-10 mt-4">
                    <form action="submit_password.php" method="post">
                        <?php
                        session_start();
                        if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
                            echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                            echo '<input type="hidden" name="username" value="' . $_SESSION['username'] . '">';
                        }
                        ?>
                        <div class="form-group">
                            <label for="password"> <h2>Adgangskode:</h2> </label>
                            <input type="password" class="form-control tall-input rounded shadow-sm border-0" id="password" name="password" placeholder="Vælg din kode">
                        </div>
                        <div class="form-group mb-4">
                            <label for="confirm_password" class="mt-3"><h3>Bekræft koden:</h3></label>
                            <input type="password" class="form-control mb-3 tall-input rounded shadow-sm border-0" id="confirm_password" name="confirm_password" placeholder="Bekræft din kode">
                        </div>
                        <div class="row">
                            <div class="col text-start">
                                <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='po1.php'">
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
    </div>
</main>

<footer>
    <?php include "includes/footer.php";?>
</footer>
<script src="js/main.js"></script>
<script>
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const nextButton = document.getElementById('nextButton');

    function validatePasswords() {
        // tjekker efter 1 tal, 1 stort bogstav og ingen mellemrum
        const hasNumber = /\d/;
        const hasUpperCase = /[A-Z]/;
        const noSpaces = /^\S*$/;

        const isValidPassword = password.value.length >= 8 && //tjekker efter om der er mere end 8 bogstaver
            hasNumber.test(password.value) &&
            hasUpperCase.test(password.value) &&
            noSpaces.test(password.value);
        if (isValidPassword && password.value === confirmPassword.value) {
            nextButton.disabled = false;
        } else {
            nextButton.disabled = true;
        }
    }
    password.addEventListener('input', validatePasswords);
    confirmPassword.addEventListener('input', validatePasswords);
</script>

<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
