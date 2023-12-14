<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aboutUser = $_POST["aboutUser"];
    session_start();
    $userId = $_SESSION['userId'];

    try {
        $sql = "UPDATE moedts SET aboutUser = :aboutUser WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['aboutUser' => $aboutUser, 'userId' => $userId]);

        // Inform the user of successful about text update
        echo "Din profiltekst er blevet opdateret."; // "Your profile text has been updated."
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit("Fejl: " . $e->getMessage()); // "Error: "
    }
} else {
    header("Location: p1.php");
    exit();
}
?>
