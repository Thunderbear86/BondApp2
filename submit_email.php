<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (!empty($_SESSION['userId'])) {
        $email = $_POST["email"];
        $userId = $_SESSION['userId'];

        // Simple validation
        if (empty($email)) {
            echo "<p>Email er påkrævet.</p>";
            echo "<p>Du vil blive sendt tilbage automatisk.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'po3.php'; }, 3000);</script>";
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Ugyldigt email format.</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'po3.php'; }, 3000);</script>";
            exit();
        }

        try {
            $sql = "UPDATE moedts SET email = :email WHERE userId = :userId";
            $result = $db->sql($sql, ['email' => $email, 'userId' => $userId], false);

            // Redirect to another page if needed
            header("Location: po4.php");
            exit();
        } catch (Exception $e) {
            echo "<p>Fejl: " . $e->getMessage() . "</p>";
            echo "<script>setTimeout(function(){ window.location.href = 'po3.php'; }, 3000);</script>";
            exit();
        }
    } else {
        echo "<p>Session error. Ingen bruger ID.</p>";
        exit();
    }
} else {
    header("Location: po3.php");
    exit();
}
?>
