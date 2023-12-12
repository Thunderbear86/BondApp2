<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Simple validation
    if (empty($password) || empty($confirmPassword)) {
        exit("Both password fields are required.");
    }

    if ($password !== $confirmPassword) {
        exit("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert/update into database (assuming you have the user's ID or username)
    // Replace with actual user identification and database logic
    $userId = /* User ID or username */;
    try {
        $sql = "UPDATE moedts SET password = :password WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['password' => $hashedPassword, 'userId' => $userId]);

        // Redirect or inform the user of successful password creation
        echo "Password created successfully.";
        // Redirect to another page if needed
    } catch (PDOException $e) {
        // Handle SQL errors
        exit($e->getMessage());
    }
} else {
    // Redirect to form if not POST request
    header("Location: path_to_your_form.php");
    exit();
}
?>
