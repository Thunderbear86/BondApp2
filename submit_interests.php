<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['interests'])) {
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $selectedInterests = $_POST['interests'];

        if (count($selectedInterests) < 5) {
            header("Location: p2.php?error=notenoughinterests");
            exit();
        }

        try {
            foreach ($selectedInterests as $interestId) {
                $sql = "INSERT INTO userInterests (userId, interestId) VALUES (:userId, :interestId)";
                // Use the sql() method from your db class
                $db->sql($sql, ['userId' => $userId, 'interestId' => $interestId], false);
            }

            header("Location: p3.php"); // Redirect to the next step
            exit();
        } catch (Exception $e) {
            exit("Fejl: " . $e->getMessage());
        }
    } else {
        header("Location: po1.php?error=nouserid");
        exit();
    }
} else {
    header("Location: p2.php");
    exit();
}
?>
