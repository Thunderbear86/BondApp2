<?php
require "settings/init.php";
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: login_page.php"); // Redirect to login page if not logged in
    exit();
}

$userId = $_SESSION['userId'];

// Fetch user data from the database
$userData = $db->sql("SELECT * FROM moedts WHERE userId = :userId", ['userId' => $userId]);
$userData = $userData ? $userData[0] : null;

if (!$userData) {
    echo "Brugerdata ikke fundet."; // "User data not found."
    exit();
}

// Calculate age from birthdate
$birthdate = new DateTime($userData->birthdate);
$today = new DateTime('today');
$age = $birthdate->diff($today)->y;

// Fetch user interests
$interestsData = $db->sql("SELECT interestName FROM interests INNER JOIN userInterests ON interests.interestsId = userInterests.interestsId WHERE userId = :userId", ['userId' => $userId]);

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Brugerprofil</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <!-- Header content -->
</header>
<nav>
    <?php include "includes/nav.php"; ?>
</nav>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Brugerprofil</h1>

                <!-- Field 1: About User -->
                <p><strong>Om Mig:</strong> <?php echo htmlspecialchars($userData->aboutUser); ?></p>

                <!-- Field 2: User Details -->
                <p><strong>Brugernavn:</strong> <?php echo htmlspecialchars($userData->username); ?></p>
                <p><strong>Alder:</strong> <?php echo $age; ?> år</p>
                <p><strong>Køn:</strong> <?php echo htmlspecialchars($userData->gender); ?></p>
                <p><strong>Lokation:</strong> <?php echo htmlspecialchars($userData->location); ?></p>

                <!-- Field 3: Interests -->
                <p><strong>Interesser:</strong>
                    <?php foreach ($interestsData as $interest) {
                        echo htmlspecialchars($interest->interestName) . ', ';
                    } ?>
                </p>

                <!-- Field 4: Profile Text -->
                <p><strong>Profiltekst:</strong> <?php echo htmlspecialchars($userData->profileText); ?></p>

                <!-- Field 5: Profile Picture -->
                <p><img src="<?php echo htmlspecialchars($userData->profilePicture); ?>" alt="Profilbillede" style="max-width: 200px;"></p>

                <!-- Field 6: Motto -->
                <p><strong>Motto:</strong> <?php echo htmlspecialchars($userData->motto); ?></p>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php include "includes/footer.php"; ?>
</footer>
<script src="js/main.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
