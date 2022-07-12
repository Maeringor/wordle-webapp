<?php
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

    if (isset($_POST["timeFieldCD"])) {
        // time active countdown (only minutes)
        if ($_POST["timeFieldCD"] == 0 || $_POST["timeFieldCD"] == 1) {
            addPoint($current_score + $DEFAULT_POINTS - round($DEFAULT_POINTS / 2), $_SESSION["uname"]);
        } else {
            addPoint($current_score + $DEFAULT_POINTS - round($DEFAULT_POINTS / $_POST["timeFieldCD"]), $_SESSION["uname"]);
        }
        
    } else if (isset($_POST["timeFieldCU"])) {
        // check for entry in daily table exists

        // time active countup (daily challenge) (only minutes)
        $finalPoints = $DEFAULT_POINTS - $_POST["timeFieldCU"];
        if ($finalPoints < 1) {
            $finalPoints = 1;
        }
        // add to daily table

        // add points to overall statistic
        addPoint($current_score + $finalPoints, $_SESSION["uname"]);
    } else {
        //default game
        addPoint($current_score + $DEFAULT_POINTS, $_SESSION["uname"]);
    }
}