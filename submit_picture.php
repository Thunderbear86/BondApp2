<?php
require "settings/init.php";

session_start(); // Start the session at the beginning.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profilePicture"])) {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $uploadDir = 'pp/';
        $fileName = $_FILES["profilePicture"]["name"];
        $filePath = $uploadDir . basename($fileName);
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        if($check === false) {
            exit("Filen er ikke et billede."); // "File is not an image."
        }

        // Check file size (e.g., 5MB limit)
        if ($_FILES["profilePicture"]["size"] > 5000000) {
            exit("Beklager, din fil er for stor."); // "Sorry, your file is too large."
        }

        // Allow certain file formats
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" ) {
            exit("Kun JPG, JPEG, PNG & GIF filer er tilladt."); // "Only JPG, JPEG, PNG & GIF files are allowed."
        }

        // Attempt to upload file
        if (!move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $filePath)) {
            exit("Der var en fejl ved upload af dit billede."); // "There was an error uploading your file."
        }

        // Update the user's profile picture in the database
        try {
            $sql = "UPDATE moedts SET profilePicture = :profilePicture WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->execute(['profilePicture' => $filePath, 'userId' => $userId]);

            // Redirect to another page if needed
            header("Location: p5.php"); // Replace 'next_page.php' with the actual next page
            exit();
        } catch (PDOException $e) {
            exit("Fejl: " . $e->getMessage()); // "Error: "
        }
    } else {
        // Handle the case where the session does not have userId
        echo "<p>Session error. Intet bruger ID.</p>";
        exit();
    }
} else {
    header("Location: p4.php");
    exit();
}
?>
