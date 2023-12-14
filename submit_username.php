<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    // Simple validation
    if (empty($username)) {
        // Handle error - username is empty
        exit("Username is required.");
    }

    // Insert into database
    try {
        $sql = "INSERT INTO moedts (username) VALUES (:username)";
        $stmt = $db->prepare($sql);
        $stmt->execute(['username' => $username]);

        // Redirect or inform the user of successful creation
        echo "Profile created successfully.";
        // Redirect to another page if needed
    } catch (PDOException $e) {
        // Handle SQL errors (e.g., username already exists)
        exit($e->getMessage());
    }
}

// Redirect to form or show error if not POST request
header("Location: po1.php");
exit();
?>
