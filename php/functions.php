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

/* login and register */
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


    /* sql statemants */
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
        $sql = "UPDATE ".TAB_USER." SET UScore=$score WHERE UName='$username';";
        echo $sql;
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    }

    function getRandomWord() {
        $sql_get_count_words = "SELECT COUNT(*) as c FROM ".TAB_WORDS.";";
        $resultNum = mysqli_query(conn_globale, $sql_get_count_words) or die(mysqli_error(conn_globale));
        $numArray = mysqli_fetch_assoc($resultNum);
        $num = $numArray["c"];

        $randNum = rand(1, $num);

        $sql_get_content_words = "SELECT * FROM ".TAB_WORDS." JOIN ".TAB_USER." ON ".TAB_WORDS.".UID = ".TAB_USER.".UID WHERE WID=$randNum;";
        $resultContent = mysqli_query(conn_globale, $sql_get_content_words) or die(mysqli_error(conn_globale));
        $contentArray = mysqli_fetch_assoc($resultContent);

        return $contentArray;
    }

    function getCurrentDailyWord_Date() {
        $sql = "SELECT DW_Date as d FROM ".TAB_DWORD.";";
        $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    
        $row = mysqli_fetch_assoc($result);
        if (!isset($row["d"])) {
            $oldDate = date("Y-m-d", strtotime("10-10-2001"));
            return $oldDate;
        }
        return $row["d"];
    }
    function getCurrentDailyWord_Word() {
        $sql = "SELECT DW_Word as w FROM ".TAB_DWORD.";";
        $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    
        $row = mysqli_fetch_assoc($result);
        return $row["w"];
    }

    function setNewDailyWord($date) {
        $contentArray = getRandomWord();
        $word = $contentArray["Word"];
        $sql = "UPDATE ".TAB_DWORD." SET DW_Word = '$word', DW_Date = '$date' WHERE DWID=1;";
        
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));

        return $word;
    }

    function addSugWord($word, $uid) {
        $sql = "INSERT INTO ".TAB_SWORDS." (UID, swWord) VALUES ($uid, '$word');";
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    }

    #remove sugWord function

    // checks if a word exists in the suggested word or word tables
    function checkIfWordExists($word) {
        $sql_get_count_words = "SELECT COUNT(*) as c FROM ".TAB_SWORDS." WHERE swWord='$word';";
        $resultNum = mysqli_query(conn_globale, $sql_get_count_words) or die(mysqli_error(conn_globale));
        $numArray = mysqli_fetch_assoc($resultNum);
        $num = $numArray["c"];
        $sql_get_count_words = "SELECT COUNT(*) as c2 FROM ".TAB_WORDS." WHERE Word='$word';";
        $resultNum = mysqli_query(conn_globale, $sql_get_count_words) or die(mysqli_error(conn_globale));
        $numArray = mysqli_fetch_assoc($resultNum);
        $num2 = $numArray["c2"];

        if ($num != 0 || $num2 != 0) {
            return true;
        }
        return false;
    }


    function checkIfDailyEntranceExists($uid, $date) {
        $sql_get_count_words = "SELECT COUNT(*) as c FROM ".TAB_DSCORE." WHERE DDATE='$date' AND UID=$uid;";
        $resultNum = mysqli_query(conn_globale, $sql_get_count_words) or die(mysqli_error(conn_globale));
        $numArray = mysqli_fetch_assoc($resultNum);
        $num = $numArray["c"];
        
        if ($num != 0) {
            return true;
        }
        return false;
    }

    function addDailyScore($score, $uid, $time) {
        $server_date = date("Y-m-d");
        $sql = "INSERT INTO ".TAB_DSCORE." (DDATE, UID, DScore, DTIME) VALUES ('$server_date', $uid, $score, '$time');";
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    }

    function getSingleDailyPostion($uid, $date) {
        $sql = "SELECT * FROM ".TAB_DSCORE." WHERE DDATE='$date' ORDER BY DScore DESC";
        $counter = 1;

        $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["UID"] == $uid) {
                return $counter;
            }
            $counter += 1;
        }
        return $counter;
    }

    function addWord($word, $uid){
        $sql = "INSERT INTO ".TAB_WORDS." (UID, Word) VALUES ($uid, $word);";
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));

        removeSugWord($word);

    }

    function removeSugWord($word){
        $sql = "DELETE FROM ".TAB_SWORDS." WHERE swWord = $word;";
        mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    }