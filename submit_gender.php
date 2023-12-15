<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $gender = $_POST["gender"];

    // Simple validation for gender
    if (empty($gender)) {
        echo "<p>Køn er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po6.php'; }, 3000);</script>";
        exit();
    }

    try {
        $sql = "UPDATE moedts SET gender = :gender WHERE userId = :userId";
        $result = $db->sql($sql, ['gender' => $gender, 'userId' => $userId], false);

        // Redirect to another page if needed
        header("Location: po7.php");
        exit();
    } catch (Exception $e) {
        echo "<p>Fejl: " . $e->getMessage() . "</p>";
        exit();
    }
} else {
    header("Location: po6.php");
    exit();
}
?>
