<?php
session_start();
// private games should never be evaluated
if (isset($_POST["isForFriend"]) && $_POST["isForFriend"] == 'true' || !isset($_SESSION["uid"])) {
    header("Location: ../gamemodis.php");
    exit();
}
require_once "functions.php";

if (isset($_POST["submitGameEnd"])) {
    $current_score = getScore($_SESSION["uname"]);
    put($current_score);
    
    header("Location: ../gamemodis.php?info=saved");
    exit();
}

function put($current_score) {
    $DEFAULT_POINTS = 100;
    $server_date = date("Y-m-d");

    if (isset($_POST["timeFieldCD"])) {
        // time active countdown (only minutes)
        if ($_POST["timeFieldCD"] == 0 || $_POST["timeFieldCD"] == 1) {
            addPoint($current_score + $DEFAULT_POINTS - round($DEFAULT_POINTS / 2), $_SESSION["uname"]);
        } else {
            addPoint($current_score + $DEFAULT_POINTS - round($DEFAULT_POINTS / $_POST["timeFieldCD"]), $_SESSION["uname"]);
        }
        
    } else if (isset($_POST["timeFieldCU"]) && !checkIfDailyEntranceExists($_SESSION["uid"], $server_date)) {
        // time active countup (daily challenge) (only minutes)
        $finalPoints = $DEFAULT_POINTS - (int)$_POST["timeFieldCU"];
        if ($finalPoints < 1) {
            $finalPoints = 1;
        }
        // add to daily table
        $time = "00:".$_POST["timeFieldCU"].":".$_POST["timeFieldCUSeconds"];
        addDailyScore($finalPoints, $_SESSION["uid"], $time);

        // add points to overall statistic
        addPoint($current_score + $finalPoints, $_SESSION["uname"]);
    } else if (!isset($_POST["timeFieldCD"]) && !isset($_POST["timeFieldCU"])) {
        //default game
        addPoint($current_score + $DEFAULT_POINTS, $_SESSION["uname"]);
    }
}