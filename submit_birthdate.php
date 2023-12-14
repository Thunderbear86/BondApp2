<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $birthdate = $_POST["birthdate"];

    // Validate birthdate format here if necessary
// Simple validation
    if (empty($birthdate)) {
        echo "<p>Fødselsdag er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po4.php'; }, 3000);</script>";
        exit();
    }
    // Assuming session contains userId
    session_start();
    $userId = $_SESSION['userId'];

    try {
        $sql = "UPDATE moedts SET birthdate = :birthdate WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['birthdate' => $birthdate, 'userId' => $userId]);

        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
} else {
    header("Location: po4.php");
    exit();
}
?>
