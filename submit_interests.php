<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['interests'])) {
    $userId = $_POST['userId'];
    $selectedInterests = $_POST['interests'];

    // Ensure at least 5 interests are selected
    if (count($selectedInterests) < 5) {
        exit("Vælg mindst 5 interesser."); // "Please select at least 5 interests."
    }

    // Insert selected interests into userInterests table
    try {
        foreach ($selectedInterests as $interestId) {
            $sql = "INSERT INTO userInterests (userId, interestId) VALUES (:userId, :interestId)";
            $stmt = $db->prepare($sql);
            $stmt->execute(['userId' => $userId, 'interestId' => $interestId]);
        }

        echo "Interesser blev gemt."; // "Interests saved."
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit("Fejl: " . $e->getMessage()); // "Error: "
    }
} else {
    header("Location: p2.php");
    exit();
}
?>
