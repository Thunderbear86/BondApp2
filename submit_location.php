<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST["location"];

    // Simple validation for location
    if (empty($location)) {
        exit("Lokation er påkrævet."); // "Location is required."
    }

    // Assuming session contains userId
    session_start();
    $userId = $_SESSION['userId'];

    try {
        $sql = "UPDATE moedts SET location = :location WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['location' => $location, 'userId' => $userId]);

        // Inform the user of successful location update
        echo "Lokation opdateret succesfuldt."; // "Location updated successfully."
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit("Fejl: " . $e->getMessage()); // "Error: "
    }
} else {
    header("Location: po5.php");
    exit();
}
?>
