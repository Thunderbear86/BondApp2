<?php
require "settings/init.php";

session_start(); // Start the session at the beginning.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $profileText = $_POST["profileText"];

        // Validate the profile text length
        if (strlen($profileText) < 300) {
            echo "<p>Profilteksten skal være mindst 300 tegn lang.</p>";
            echo "<p>Du vil blive sendt tilbage automatisk.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'p3.php'; }, 3000);</script>";
            exit();
        }

        try {
            $sql = "UPDATE moedts SET profileText = :profileText WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->execute(['profileText' => $profileText, 'userId' => $userId]);

            // Redirect to the next page after successful update
            header("Location: p4.php"); // Redirect to the next step in the profile creation process
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
    header("Location: p3.php");
    exit();
}
?>
