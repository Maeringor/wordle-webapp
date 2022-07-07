<?php

require_once "db.conn.php";
require_once "functions.php";

if (isset($_POST["submit"])) {
    $uname = $_POST["user"];
    $upass = $_POST["pass"];
    $upassRepeat = $_POST["passConfirm"];

    if (emptyInputSignup($uname, $upass, $upassRepeat) !== false) {
        header("location: ../register.php");
        exit();
    }
    if (invalidName($uname) !== false) {
        header("location: ../register.php");
        exit();
    }
    if (pwdMatch($upass, $upassRepeat) === false) {
        header("location: ../register.php");
        exit();
    }
    if (userExists($conn, $uname) !== false) {
        header("location: ../register.php");
        exit();
    }

    createUser($conn, $uname, $upass);
    
} else {
    header("location: ../register.php");
    exit();
}