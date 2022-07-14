<?php
require_once "functions.php";
echo 'Test';

$intWords = $_POST["countWords"];
echo $intWords;

for($i = 1; $i <= (int)$intWords; $i++){
    $acceptString = "accept".$i;
    $declineString = "decline".$i;
    echo 'Test';
    if (isset($_POST[$acceptString])) {
    

        addWord($_POST["swWord"], $_SESSION["uid"]);
            header("Location: ../index.php?info=wordSaved");
            exit();
    }
    else if (isset($_POST[$declineString])){
            echo 'Test';
            removeSugWord($_POST["swWord"]);
            header("Location: ../index.php?info=wordRemoved");
            exit();
    }else{
            header("Location: ../index.php?error=couldentUseInput");
            exit(); 
    }
}





?>
