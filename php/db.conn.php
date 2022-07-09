<?php

require_once "config.php";

// create connection
$conn = new mysqli($DB_SERVERNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }

 define('conn_globale', $conn);

// all tables
define('TAB_USER', 'user');
$TAB_DSCORE = "DailyScore";
$TAB_WORDS = "Words";
$TAB_SWORDS = "SugWords";
$TAB_DWORD = "DailyWord";

?>