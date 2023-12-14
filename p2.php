<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Interesser</title>
    <!-- ... rest of the head ... -->
</head>
<body>
<!-- ... header and nav ... -->

<main>
    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" width="100" height="100">
            <div class="col-lg-12">
                <h1>Vælg dine interesser</h1>
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
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='p1.php'">Tilbage</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='p3.php'">Næste</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- ... footer ... -->
</body>
</html>
