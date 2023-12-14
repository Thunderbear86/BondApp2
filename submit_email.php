<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Simple validation
    if (empty($email)) {
        echo "<p>Email er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po3.php'; }, 3000);</script>";
        exit();
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


        // Redirect to another page if needed
    } catch (PDOException $e) {
        // Handle SQL errors
        exit($e->getMessage());
    }
} else {
    // Redirect to form if not POST request
    header("po3.php");
    exit();
}
?>

