<?php
require "settings/init.php";
session_start(); // Start the session at the beginning of the script.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    // Simple validation
    if (empty($username)) {
        echo "<p>Et brugernavn er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po1.php'; }, 3000);</script>";
        exit();
    }

    // Insert into database and get the user ID
    try {
        $sql = "INSERT INTO moedts (username) VALUES (:username)";
        $result = $db->sql($sql, ['username' => $username], false);

        // Fetch the last inserted user ID
        $userId = $db->lastInsertId();
        $_SESSION['userId'] = $userId;  // Store userId in the session

        // Redirect to the next page in the profile creation process
        header("Location: po2.php");
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
        echo "<script>setTimeout(function(){ window.location.href = 'po1.php'; }, 3000);</script>";
        exit();
    }
} else {
    header("Location: po1.php");
    exit();
}
?>
