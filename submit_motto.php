<?php
require "settings/init.php";

session_start(); // Start the session at the beginning.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $motto = $_POST["motto"];

        // Validate the motto length
        if (strlen($motto) < 100) {
            echo "<p>Citat, motto eller sætning skal være mindst 100 tegn lang.</p>";
            echo "<p>Du vil blive sendt tilbage automatisk.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'p5.php'; }, 3000);</script>";
            exit();
        }

        try {
            $sql = "UPDATE moedts SET motto = :motto WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->execute(['motto' => $motto, 'userId' => $userId]);

            // Redirect to another page if needed
            header("Location: user_page.php"); // Redirect to the user profile page after update
            exit();
        } catch (PDOException $e) {
            exit("Fejl: " . $e->getMessage()); // "Error: "
        }
    } else {
        // Handle the case where the session does not have userId
        echo "<p>Session error. Ingen bruger ID.</p>";
        exit();
    }
} else {
    header("Location: p5.php");
    exit();
}
?>
