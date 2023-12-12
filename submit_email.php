<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Simple validation
    if (empty($email)) {
        exit("Email field is required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Invalid email format.");
    }

    // Insert/update into database (assuming you have the user's ID or username)
    // Replace with actual user identification and database logic
    $userId = $_POST['userId'];
    try {
        $sql = "UPDATE moedts SET email = :email WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['email' => $email, 'userId' => $userId]);

        // Redirect or inform the user of successful email addition
        echo "Email added successfully.";
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

