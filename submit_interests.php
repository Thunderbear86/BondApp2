<?php
require "settings/init.php";

session_start(); // Start the session at the beginning.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['interests'])) {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $selectedInterests = $_POST['interests'];

        // Ensure at least 5 interests are selected
        if (count($selectedInterests) < 5) {
            echo "<p>Vælg mindst 5 interesser.</p>";
            echo "<p>Du vil blive sendt tilbage automatisk.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'p2.php'; }, 3000);</script>";
            exit();
        }

        // Insert selected interests into userInterests table
        try {
            foreach ($selectedInterests as $interestId) {
                $sql = "INSERT INTO userInterests (userId, interestId) VALUES (:userId, :interestId)";
                $stmt = $db->prepare($sql);
                $stmt->execute(['userId' => $userId, 'interestId' => $interestId]);
            }

            // Redirect to the next page after successful update
            header("Location: p3.php"); // Redirect to the next step in the profile creation process
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
    header("Location: p2.php");
    exit();
}
?>
