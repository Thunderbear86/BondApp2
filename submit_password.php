<?php
require "settings/init.php";
session_start(); // Start the session at the beginning of the script.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Simple validation
    if (empty($password) || empty($confirmPassword)) {
        echo "<p>Udfyld begge felter</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po2.php'; }, 3000);</script>";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "<p>Kode matcher ikke.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po2.php'; }, 3000);</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update password in the database using userId from session
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        try {
            $sql = "UPDATE moedts SET password = :password WHERE userId = :userId";
            $stmt = $db->sql($sql, ['password' => $hashedPassword, 'userId' => $userId], false);

            // Redirect to the next page in the profile creation process
            header("Location: po3.php");
            exit();
        } catch (Exception $e) {
            echo "Fejl: " . $e->getMessage();
            exit();
        }
    } else {
        // Handle the case where the session does not have userId
        echo "<p>Session error. Ingen bruger ID.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po1.php'; }, 3000);</script>";
        exit();
    }
} else {
    // Redirect to form if not POST request
    header("Location: po2.php");
    exit();
}
?>
