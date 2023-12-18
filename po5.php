<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Lokation</title>
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
    <div class="row justify-content-center">
        <img class="mt-5 mb-3 p-0" src="img/TEST%202.png" alt="logo" style="max-width: 50%;">
        <div class="col-10 mb-2">
            <h3>Profiloprettelse</h3>
        </div>
        <div class=" col-10 mb-3">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="71.4">71,4%</div>
            </div>
        </div>
        <div class="col-10 mb-5">
            <p>Vi er dér lige stræks!</p>
        </div>
        <div class="col-10 mb-4 mt-4">
            <h5>Hvor i landet befinder du dig?</h5>
        </div>
            <div class="col-10">
                <form action="submit_location.php" method="post">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="location"><h2>Indtast din lokation</h2></label>
                        <input type="text" class="form-control mb-4 shadow-sm border-0 tall-input rounded" id="location" name="location" placeholder="Indtast din by" required>
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='po4.php'">
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
    const locationInput = document.getElementById('location');
    const nextButton = document.getElementById('nextButton');

    function validateInput() {
        let inputText = locationInput.value.trim(); // for "white spaces"
        nextButton.disabled = inputText === '';
    }

    //tjekker efter om der er skrevet noget
    locationInput.addEventListener('input', validateInput);
</script>

<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
