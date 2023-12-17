<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $aboutUser = $_POST["aboutUser"];

        try {
            $sql = "UPDATE moedts SET aboutUser = :aboutUser WHERE userId = :userId";
            // Use sql() method of db class
            $db->sql($sql, ['aboutUser' => $aboutUser, 'userId' => $userId], false);

            header("Location: p2.php"); // Redirect to the next step
            exit();
        } catch (Exception $e) {
            exit("Fejl: " . $e->getMessage());
        }
    } else {
        echo "<p>Session error. No user ID.</p>";
        exit();
    }
} else {
    header("Location: p1.php");
    exit();
}
?>
