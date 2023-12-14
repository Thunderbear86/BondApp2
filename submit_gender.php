<?php
require "settings/init.php";

session_start(); // Start the session at the beginning.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $gender = $_POST["gender"];

        // Simple validation for gender
        if (empty($gender)) {
            echo "<p>Køn er påkrævet.</p>";
            echo "<p>Du vil blive sendt tilbage automatisk.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'po6.php'; }, 3000);</script>";
            exit();
        }

        try {
            $sql = "UPDATE moedts SET gender = :gender WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->execute(['gender' => $gender, 'userId' => $userId]);

            // Redirect to another page if needed
            header("Location: po7.php"); // Replace 'next_page.php' with the actual next page
            exit();
        } catch (PDOException $e) {
            exit("Fejl: " . $e->getMessage()); // "Error: "
        }
    } else {
        // Handle the case where the session does not have userId
        echo "<p>Session error. No user ID.</p>";
        exit();
    }
} else {
    header("Location: po6.php");
    exit();
}
?>
