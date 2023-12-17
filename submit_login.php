<?php
require "settings/init.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $userData = $db->sql("SELECT * FROM moedts WHERE username = :username", ['username' => $username]);
    $userData = $userData ? $userData[0] : null;

    if ($userData && password_verify($password, $userData->password)) {
        $_SESSION['userId'] = $userData->userId;
        $_SESSION['username'] = $userData->username;
        header("Location: user_page.php");
        exit();
    } else {
        echo "Forkert brugernavn eller kode.";
        // Redirect back to login page or show error
    }
} else {
    header("Location: login.php");
    exit();
}
?>
