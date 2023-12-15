<?php
require "settings/init.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['interests'])) {
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $selectedInterests = $_POST['interests'];

        // Ensure at least 5 interests are selected
        if (count($selectedInterests) < 5) {
            header("Location: p2.php?error=notenoughinterests");
            exit();
        }

        // Insert selected interests into userInterests table
        try {
            foreach ($selectedInterests as $interestId) {
                $sql = "INSERT INTO userInterests (userId, interestId) VALUES (:userId, :interestId)";
                $stmt = $db->prepare($sql);
                $stmt->execute(['userId' => $userId, 'interestId' => $interestId]);
            }

            // Redirect to the next page after successful update
            header("Location: p3.php");
            exit();
        } catch (PDOException $e) {
            exit("Fejl: " . $e->getMessage());
        }
    } else {
        // Redirect to the starting point of profile creation with an error message
        header("Location: po1.php?error=nouserid");
        exit();
    }
} else {
    header("Location: p2.php");
    exit();
}
?>
