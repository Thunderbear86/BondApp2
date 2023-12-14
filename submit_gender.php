<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = $_POST["gender"];
    session_start();
    $userId = $_SESSION['userId'];

    try {
        $sql = "UPDATE moedts SET gender = :gender WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['gender' => $gender, 'userId' => $userId]);

        // Inform the user of successful gender update
        echo "Køn opdateret succesfuldt."; // "Gender updated successfully."
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit("Fejl: " . $e->getMessage()); // "Error: "
    }
} else {
    header("Location: po6.php");
    exit();
}
?>
