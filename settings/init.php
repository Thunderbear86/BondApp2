<?php
session_start();
require "classes/classDB.php";

define("CONFIG_LIVE", "1"); // Set to 1 for live environment

if(CONFIG_LIVE == 0){
    // Local environment details (keep these for local testing)
    $DB_SERVER = "localhost";
    $DB_NAME = "local_dbname";
    $DB_USER = "root";
    $DB_PASS = "";
} else {
    // Live environment details
    $DB_SERVER = "mysql66.unoeuro.com"; // Hostname for your MySQL server
    $DB_NAME = "fenris_dk_db"; // Your database name
    $DB_USER = "fenris_dk"; // Your database username
    $DB_PASS = "g3HkmBEab5pAR2cztxnF"; // Your database password
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);
?>
