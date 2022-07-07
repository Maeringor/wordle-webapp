<?php

require_once "config.php";

// create connection
$conn = new mysqli($DB_SERVERNAME, $DB_USERNAME, $DB_PASSWORD);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }

// all tables
$TAB_USER = "User";
$TAB_DSCORE = "DailyScore";
$TAB_WORDS = "Words";
$TAB_SWORDS = "SugWords";
$TAB_DWORD = "DailyWord";

?>