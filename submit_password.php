<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Simple validation
    if (empty($password) || empty($confirmPassword)) {
        echo "<p>Udfyld begge felter</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po2.php'; }, 3000);</script>";
        exit();
    }

    if ($password !== $confirmPassword) {
        exit("Kode matcher ikke.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert/update into database (assuming you have the user's ID or username)
    // Replace with actual user identification and database logic
    $userId = $_POST['userId'];
    try {
        $sql = "UPDATE moedts SET password = :password WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['password' => $hashedPassword, 'userId' => $userId]);

        // Redirect to another page if needed
    } catch (PDOException $e) {
        // Handle SQL errors
        exit($e->getMessage());
    }
} else {
    // Redirect to form if not POST request
    header("po2.php");
    exit();
}
?>
