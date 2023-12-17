<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $profileText = $_POST["profileText"] ?? ''; // Capture the profileText from POST data

        if (strlen($profileText) < 300) {
            header("Location: p3.php?error=shorttext");
            exit();
        }

        try {
            $sql = "UPDATE moedts SET profileText = :profileText WHERE userId = :userId";
            // Use the sql() method from your db class
            $db->sql($sql, ['profileText' => $profileText, 'userId' => $userId], false);

            header("Location: p4.php"); // Redirect to the next step
            exit();
        } catch (Exception $e) {
            echo "Fejl: " . $e->getMessage();
            exit();
        }
    } else {
        header("Location: po1.php?error=nouserid");
        exit();
    }
} else {
    header("Location: p3.php");
    exit();
}
?>
