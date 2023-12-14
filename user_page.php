<?php
// Assume $userBirthdateFromDatabase is fetched from the database
$birthdate = new DateTime($userBirthdateFromDatabase);
$today = new DateTime('today');
$age = $birthdate->diff($today)->y;

echo "Age: " . $age . " years";
?>