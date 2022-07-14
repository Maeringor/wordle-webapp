<?php
require 'config.php';
require_once "db.conn.php";
require_once "functions.php";

// check if session is active, otherwise relink to login page
if (!isset($_SESSION["uid"])) {
    header("location: ../login.php");
    exit();
}

if (isset($_POST["changeButton"]) && !empty($_POST["username"]) && $_POST["username"] !== $_SESSION["uname"] && userExists(conn_globale, $_POST["username"]) == false) {
    $new_name = $_POST["username"];
    $sess_id_local = $_SESSION["uid"];
    // insert new name into database
    $sqlUpdate = "UPDATE ".TAB_USER." SET UName='$new_name' WHERE UID='$sess_id_local';";

    if (mysqli_query(conn_globale, $sqlUpdate)) {
        $_SESSION["uname"] = $_POST["username"];
    }

    header("location: ../profile.php");
    exit();
} else {
    header("location: ../profile.php?error=NoValidInput");
    exit();
}