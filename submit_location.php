<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_SESSION['userId'])) {
    $location = $_POST["location"];
    $userId = $_SESSION['userId'];

    // Simple validation for location
    if (empty($location)) {
        echo "<p>Lokation er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po5.php'; }, 3000);</script>";
        exit();
    }

    try {
        $sql = "UPDATE moedts SET location = :location WHERE userId = :userId";
        $result = $db->sql($sql, ['location' => $location, 'userId' => $userId], false);

        // Redirect to another page if needed
        header("Location: po6.php");
        exit();
    } catch (Exception $e) {
        echo "<p>Fejl: " . $e->getMessage() . "</p>";
        exit();
    }
} else {
    header("Location: po5.php");
    exit();
}
?>
