<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $birthdate = $_POST["birthdate"];

    // Validate birthdate format here if necessary

    // Assuming session contains userId
    session_start();
    $userId = $_SESSION['userId'];

    try {
        $sql = "UPDATE moedts SET birthdate = :birthdate WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['birthdate' => $birthdate, 'userId' => $userId]);

        // Redirect or inform the user of successful birthdate update
        echo "Birthdate updated successfully.";
        // Redirect to another page if needed
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
} else {
    header("Location: po4.php");
    exit();
}
?>
