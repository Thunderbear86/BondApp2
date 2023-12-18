<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Profilnavn</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header>

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
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="14.28">14.28%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Lad os oprette din profil...</p>
            </div>
            <div class="col-10 mb-4 mt-4">
                <h5>Hvad vil du gerne kaldes?</h5>
            </div>
            <div class="col-10">
                <form action="submit_username.php" method="post">
                    <div class="form-group">
                        <label for="inputProfilNavn">
                            <h2>Profilnavn:</h2>
                        </label>
                        <small style="float: right;" id="charCount">0 / 25</small>
                        <input type="text" class="form-control mb-4 shadow-sm border-0 tall-input rounded" id="inputProfilNavn" name="username" placeholder="Profilnavn" oninput="updateCharacterCount()" maxlength="25"></div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-lg btn-primary position-absolute" id="submitButton" disabled>
                               Næste
                            <i class="fa-solid fa-angle-right ps-4" style="color: #282E41;"></i>
                        </button>
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
    /* disable button funktion */
    function updateCharacterCount() {
        const inputVal = document.getElementById("inputProfilNavn").value;
        const charCounter = document.getElementById("charCount");
        charCounter.textContent = `${inputVal.length} / 25`; /* tæller */

        /* tjekker om der er skrevet noget i feltet */
        const btn = document.getElementById("submitButton");
        btn.disabled = inputVal.trim() === "";
    }
</script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
