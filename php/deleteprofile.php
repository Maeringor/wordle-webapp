<?php
require 'config.php';
require_once "db.conn.php";
require_once "functions.php";

// check if session is active, otherwise relink to login page
if (!isset($_SESSION["uid"])) {
    header("location: ../login.php");
    exit();
}

if (isset($_POST["deleteButton"])) {
    $sqlDelete = "DELETE FROM ".TAB_USER." WHERE UID=".$_SESSION["uid"].";";

    $userExists = userExists(conn_globale, $_SESSION["uname"]);

    if (strcmp($userExists["UPicLink"], "/rescources/svg/basic-profile-pic.svg") !== 0) {
        unlink($userExists["UPicLink"]);
    }

    if (mysqli_query(conn_globale, $sqlDelete)) {
        session_destroy();
    }
 
    header("location: ../index.php");
    exit();
}