<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $motto = $_POST["motto"];
    $userId = $_POST["userId"];

    // Validate the motto length
    if (strlen($motto) < 100) {
        exit("Citat, motto eller
                    sætning skal være mindst 100 tegn lang."); // "The motto/quote/fun fact must be at least 100 characters long."
    }

    try {
        $sql = "UPDATE moedts SET motto = :motto WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['motto' => $motto, 'userId' => $userId]);

        // Redirect or inform the user of successful update
        echo "Dit citat, motto eller sætning er blevet opdateret. <a href='user_page.php'>Gå til din profil</a>"; // "Your motto/quote/fun fact has been updated."
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit("Fejl: " . $e->getMessage()); // "Error: "
    }
} else {
    header("Location: p5.php");
    exit();
}
?>
