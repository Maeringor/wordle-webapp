<?php
require_once "functions.php";
$intWords = $_POST["countWords"];

for($i = 1; $i <= (int)$intWords; $i++){
    $acceptString = "accept".$i;
    $declineString = "decline".$i;
    echo $declineString;
    echo 'Test';
    if (isset($_POST[$acceptString])) {
        addWord($_POST["swWord"], $_POST["idSwWord"]);
        header("Location: ../adminpage.php?info=wordSaved");
        exit();
    }
    else if (isset($_POST[$declineString])){
        removeSugWord($_POST["swWord"]);
        header("Location: ../adminpage.php?info=wordRemoved");
        exit();
    }else{
        header("Location: ../index.php?error=couldentUseInput");
        exit(); 
    }
}





?>
