<?php
require 'config.php';
require_once "db.conn.php";

// check if session is active, otherwise relink to login page
session_start();
if (!isset($_SESSION["uid"])) {
    header("location: ../login.php");
    exit();
}

if (isset($_POST["submit"]) && !empty($_POST["username"]) && $_POST["username"] !== $_SESSION["uname"]) {
    // insert new name into database
    $sqlUpdate = "UPDATE ".$TAB_USER." SET UName=".$_POST["username"]." WHERE UID=".$_SESSION["uid"].";";

    if (mysqli_query($conn, $sqlUpdate)) {
        $_SESSION["uname"] = $_POST["username"];
    }

    header("location: ../profile.php");
    exit();
} else {
    header("location: ../profile.php");
    exit();
}