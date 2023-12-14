<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profileText = $_POST["profileText"];
    $userId = $_POST["userId"];

    // Validate the profile text length
    if (strlen($profileText) < 300) {
        exit("Profilteksten skal være mindst 300 tegn lang."); // "The profile text must be at least 300 characters long."
    }

    try {
        $sql = "UPDATE moedts SET profileText = :profileText WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['profileText' => $profileText, 'userId' => $userId]);

        // Redirect or inform the user of successful update
        echo "Din profiltekst er blevet opdateret."; // "Your profile text has been updated."
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit("Fejl: " . $e->getMessage()); // "Error: "
    }
} else {
    header("Location: p3.php");
    exit();
}
?>
