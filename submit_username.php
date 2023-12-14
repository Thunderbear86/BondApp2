<?php
require "settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    // Simple validation
    if (empty($username)) {
        // Handle error - username is empty
        echo "<p>Et brugernavn er påkrævet.</p>";
        echo "<p>Du vil blive sendt tilbage automatisk.</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'po1.php'; }, 3000);</script>";
        exit();
    }

    // Insert into database
    try {
        $sql = "INSERT INTO moedts (username) VALUES (:username)";
        $stmt = $db->prepare($sql);
        $stmt->execute(['username' => $username]);

        // Redirect to another page if needed
        header("Location: next_page.php");  // Replace 'next_page.php' with the actual next page
        exit();
    } catch (PDOException $e) {
        // Handle SQL errors (e.g., username already exists)
        echo $e->getMessage();
        echo "<script>setTimeout(function(){ window.location.href = 'po1.php'; }, 3000);</script>";
        exit();
    }
} else {
    // Redirect to form if not a POST request
    header("Location: po1.php");
    exit();
}
?>
