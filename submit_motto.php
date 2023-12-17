<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $motto = $_POST["motto"] ?? ''; // Capture the motto from POST data

        // Validate the motto length
        if (strlen($motto) < 100) {
            // Redirect to p5.php with an error message in the URL
            header("Location: p5.php?error=shortmotto");
            exit();
        }

        try {
            // Update the motto in the database
            $sql = "UPDATE moedts SET motto = :motto WHERE userId = :userId";
            // Assuming your db class has a method to handle parameterized queries
            $result = $db->sql($sql, ['motto' => $motto, 'userId' => $userId], false);

            // Redirect to the user profile page after successful update
            header("Location: login.php");
            exit();
        } catch (Exception $e) {
            // Handle any exceptions/errors
            echo "Fejl: " . $e->getMessage();
            exit();
        }
    } else {
        // If userId is not set, redirect to the starting point of profile creation or an error page
        header("Location: po1.php"); // Redirect to the initial profile creation page
        exit();
    }
} else {
    header("Location: p5.php");
    exit();
}
?>
