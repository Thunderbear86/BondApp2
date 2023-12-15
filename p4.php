<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Opret Profil - Profilbillede</title>
    <!-- [Rest of the head content] -->
</head>
<body>

<main>
    <div class="container">
        <div class="row">
            <img src="img/LOGO.png" alt="logo" style="max-width: 100px; max-height: 100px;">
            <div class="col-lg-12">
                <h1>Upload dit profilbillede</h1>
                <form action="submit_picture.php" method="post" enctype="multipart/form-data">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId'])) {
                        echo '<input type="hidden" name="userId" value="' . $_SESSION['userId'] . '">';
                    }
                    ?>
                    <div class="form-group">
                        <label for="profilePicture">Profilbillede</label>
                        <input type="file" class="form-control" id="profilePicture" name="profilePicture" required>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='p3.php'">Tilbage</button>
                    <button type="submit" class="btn btn-primary">Næste</button>
                </form>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php include "includes/footer.php";?>
</footer>
<script src="js/main.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
