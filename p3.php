<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Profiltekst</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<main>
    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" width="100" height="100">
            <div class="col-lg-12">
                <h1>Skriv din profiltekst</h1>
                <form action="submit_text.php" method="post" onsubmit="return validateTextLength()">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                        echo '<input type="hidden" name="username" value="' . $_SESSION['username'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="profileText">Profiltekst (mindst 300 tegn)</label>
                        <textarea class="form-control" id="profileText" name="profileText" rows="6" required></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='p2.php'">Tilbage</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='p4.php'">Næste</button>
                </form>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php include "includes/footer.php";?>
</footer>
<script>
    function validateTextLength() {
        var text = document.getElementById("profileText").value;
        if (text.length < 300) {
            alert("Profilteksten skal være mindst 300 tegn.");
            return false;
        }
        return true;
    }
</script>
<script src="js/main.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
