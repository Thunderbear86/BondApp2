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
<header>
    <!-- Header content -->
</header>
<nav>
    <?php include "includes/nav.php";?>
</nav>

<main>
    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" width="100" height="100">
            <div class="col-lg-12">
                <h1>Skriv et kort citat, motto eller sætning</h1>
                <form action="submit_motto.php" method="post" onsubmit="return validateMottoLength()">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="motto">Citat, motto eller sætning (mindst 100 tegn)</label>
                        <textarea class="form-control" id="motto" name="motto" rows="4" required></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='p4.php'">Tilbage</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='user_page.php'">Afslut</button>
                </form>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php include "includes/footer.php";?>
</footer>
<script>
    function validateMottoLength() {
        var text = document.getElementById("motto").value;
        if (text.length < 100) {
            alert("Motto/Quote/Fun Fact skal være mindst 100 tegn.");
            return false;
        }
        return true;
    }
</script>
<script src="js/main.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
