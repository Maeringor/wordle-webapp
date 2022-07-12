<?php

require_once 'db.conn.php';

function userExists($conn, $username) {
    $sql = "SELECT * FROM ".TAB_USER." WHERE UName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectForErrors("../index.php");
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputSignup($uname, $upass, $upassRepeat) {
    return (empty($uname) || empty($upass) || empty($upassRepeat));
}

function invalidName($uname) {
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function pwdMatch($upass, $upassRepeat) {
    return $upass === $upassRepeat;
}

function createUser($conn, $uname, $upass) {
    $sql = "INSERT INTO ".TAB_USER." (UName, UPassword, UScore, UPicLink, URole) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        redirectForErrors("../index.php");
    }

    $hashedPwd = password_hash($upass, PASSWORD_DEFAULT);

    $start_score = 0;
    $default_piclink = "/rescources/svg/basic-profile-pic.svg";
    $default_role = "U";
    mysqli_stmt_bind_param($stmt, "ssiss", $uname, $hashedPwd, $start_score, $default_piclink, $default_role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    loginUser($conn, $uname, $upass);
    redirectForErrors("../index.php");
}


function emptyInputLogin($uname, $upass) {
    return (empty($uname) || empty($upass));
}

function loginUser($conn, $uname, $upass) {
    $userExists = userExists($conn, $uname);

    if ($userExists === false) {
        redirectForErrors("../index.php?error=userNotExists");
    }

    $pwdHashed = $userExists["UPassword"];
    $checkPWD = password_verify($upass, $pwdHashed);
    if ($checkPWD === false) {
        redirectForErrors("../login.php?error=wrongPW");
    } else {
        session_start();
        $_SESSION["uid"] = $userExists["UID"];
        $_SESSION["uname"] = $userExists["UName"];
        $_SESSION["urole"] = $userExists["URole"];

        redirectForErrors("../index.php");
    }
}

    // auto link to a page
    function redirectForErrors($link_to_page) {
        header("Location: ".$link_to_page);
        exit();
    }



    function getScore($username) {
        $sql = "SELECT UScore as sc FROM ".TAB_USER." WHERE UName='$username';";
        $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    
        $row = mysqli_fetch_assoc($result);
        return $row["sc"];
    }

    function getPlace($username) {
        $sql = "SELECT * FROM ".TAB_USER." ORDER BY UScore DESC;";
        $counter = 1;

        $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["UName"] == $username) {
                return $counter;
            }
            $counter += 1;
        }
    }
    
    function addPoint($score, $username) {
        $sql = "INSERT INTO ".TAB_USER."(UScore) VALUES (".$score.") WHERE UName=".$username.";";
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    }
