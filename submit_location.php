<?php
require "settings/init.php";

session_start(); // It's generally a good practice to start the session at the beginning of the script.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST["location"];

    // Simple validation for location
    if (empty($location)) {
        echo "<p>Lokation er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po5.php'; }, 3000);</script>";
        exit();
    }

    // Assuming session contains userId
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];

        try {
            $sql = "UPDATE moedts SET location = :location WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->execute(['location' => $location, 'userId' => $userId]);

            // Redirect to another page if needed
            header("Location: next_page.php"); // Replace 'next_page.php' with the actual next page
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
    header("Location: po5.php");
    exit();
}
?>
