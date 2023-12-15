<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (!empty($_SESSION['userId'])) {
        $birthdate = $_POST["birthdate"];
        $userId = $_SESSION['userId'];

        // Simple validation
        if (empty($birthdate)) {
            echo "<p>Fødselsdag er påkrævet.</p>";
            echo "<p>Du vil blive sendt tilbage automatisk.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'po4.php'; }, 3000);</script>";
            exit();
        }

        try {
            $sql = "UPDATE moedts SET birthdate = :birthdate WHERE userId = :userId";
            $result = $db->sql($sql, ['birthdate' => $birthdate, 'userId' => $userId], false);

            // Redirect to another page if needed
            header("Location: po5.php");
            exit();
        } catch (Exception $e) {
            echo "<p>Fejl: " . $e->getMessage() . "</p>";
            exit();
        }
    } else {
        echo "<p>Session error. Ingen bruger ID.</p>";
        exit();
    }
} else {
    header("Location: po4.php");
    exit();
}
?>
