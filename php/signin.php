<?php
require_once "db.conn.php";
require_once "functions.php";

if (isset($_POST["submit"])) {
    $uname = $_POST["user"];
    $upass = $_POST["pass"];

    if (emptyInputLogin($uname, $upass) !== false) {
        header("location: ../login.php?error=EmptyLogin");
        exit();
    }

    loginUser(conn_globale, $uname, $upass);
} else {
    header("location: ../login.php");
    exit();
}
?>

