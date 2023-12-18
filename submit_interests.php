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
            // Begin transaction
            $db->beginTransaction();

            foreach ($selectedInterests as $interestId) {
                $sql = "INSERT INTO userinterests (userId, interestsId) VALUES (:userId, :interestsId)";
                $db->sql($sql, ['userId' => $userId, 'interestsId' => $interestId], false);
            }

            // Commit transaction
            $db->commit();

            header("Location: p3.php"); // Redirect to the next step
            exit();
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $db->rollback();

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
