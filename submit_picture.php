<?php
require "settings/init.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profilePicture"])) {
    if (!empty($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $uploadDir = 'pp/';
        $fileName = $_FILES["profilePicture"]["name"];
        $filePath = $uploadDir . basename($fileName);
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        // Image validation steps...

        // Attempt to upload file
        if (!move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $filePath)) {
            exit("Der var en fejl ved upload af dit billede.");
        }

        try {
            $sql = "UPDATE moedts SET profilePicture = :profilePicture WHERE userId = :userId";
            // Use the sql() method from your db class
            $db->sql($sql, ['profilePicture' => $filePath, 'userId' => $userId], false);

            header("Location: p5.php");
            exit();
        } catch (Exception $e) {
            echo "Fejl: " . $e->getMessage();
            exit();
        }
    } else {
        header("Location: po1.php?error=nouserid");
        exit();
    }
} else {
    header("Location: p4.php");
    exit();
}
?>
