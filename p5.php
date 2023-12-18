<?php
session_start();
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - citat, motto eller
        sætning</title>
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
                    <div class="progress-bar progress-bar-striped progress-bar-animated custom-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0" data-progress="100">100%</div>
                </div>
            </div>
            <div class="col-10 mb-5">
                <p>Bravo! Nu mangler vi kun det sidste!</p>
            </div>
            <div class="col-10 mb-4 mt-4">
                <h5></h5>
            </div>
            <div class="col-10">
                <form action="submit_motto.php" method="post" onsubmit="return validateMottoLength()">
                    <?php
                    if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                        echo '<input type="hidden" name="username" value="' . $_SESSION['username'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="motto"><h2>Skriv et motto eller citat som beskriver dig</h2></label>
                        <small style="float: right;" id="charCount">0 / 100</small>
                        <textarea class="form-control mb-4 shadow-sm border-0 rounded" id="motto" name="motto" rows="4" placeholder="Don't talk to me before I've had my coffee" maxlength="100" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='p4.php'">
                                <i class="fa-solid fa-angle-left pe-4" style="color: #282E41;"></i>
                                Tilbage
                            </button>
                        </div>
                        <div class="col text-end">
                            <button type="submit" id="nextButton" class="btn btn-primary btn-lg" disabled>
                                Afslut
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
<script>
    const mottoTextarea = document.getElementById('motto');
    const nextButton = document.getElementById('nextButton');
    const charCountElement = document.getElementById('charCount');

    function updateButtonState() {
        const textLength = mottoTextarea.value.length;
        charCountElement.textContent = textLength + ' / 100';
        nextButton.disabled = textLength === 0;
    }

    mottoTextarea.addEventListener('input', updateButtonState);
</script>
<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a188e3149f.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
