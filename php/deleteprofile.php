<?php
require 'config.php';
require_once "db.conn.php";

// check if session is active, otherwise relink to login page
session_start();
if (!isset($_SESSION["uid"])) {
    header("location: ../login.php");
    exit();
}

if (isset($_POST["submit"])) {
    $sqlDelete = "DELETE FROM ".$TAB_USER." WHERE UID=".$_SESSION["uid"].";";

    if (mysqli_query($conn, $sqlDelete)) {
        session_destroy();
    }
 
    header("location: ../index.php");
    exit();
}