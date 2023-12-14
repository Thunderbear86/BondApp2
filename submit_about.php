<?php
require "settings/init.php";

session_start(); // Start the session at the beginning.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $aboutUser = $_POST["aboutUser"];

        // Additional validation can be added here if needed

        try {
            $sql = "UPDATE moedts SET aboutUser = :aboutUser WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->execute(['aboutUser' => $aboutUser, 'userId' => $userId]);

            // Redirect to another page after successful update
            header("Location: p2.php"); // Replace 'next_page.php' with the actual next page
            exit();
        } catch (PDOException $e) {
            exit("Fejl: " . $e->getMessage()); // "Error: "
        }
    } else {
        // Handle the case where the session does not have userId
        echo "<p>Session error. Intet bruger ID.</p>";
        exit();
    }
} else {
    header("Location: p1.php");
    exit();
}
?>
