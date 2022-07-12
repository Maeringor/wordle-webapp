<?php
require_once "functions.php";

if (isset($_POST["submitWord"]) && isset($_POST["custom"])) {
    $word = $_POST["custom"];
    if (!checkIfWordExists($word)) {
        // add to sugWord table
        addSugWord(strtoupper($word), $_SESSION["uid"]);
        header("Location: ../index.php?info=wordSent");
        exit();
    } else {
        header("Location: ../index.php?info=noWordSaved");
        exit();
    }  
}