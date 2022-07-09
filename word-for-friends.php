<?php
require_once "php/config.php";

if($WEB_PORT != "") {
    $local_web_port = ":".$WEB_PORT;
}

$standard_link = $WEB_PROTOCOL."://".$WEB_URL.$local_web_port;
$link_default_game = $standard_link."/default-game.php?word=";
$link_time_game = $standard_link."/time-game.php?word=";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Worlde</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     <!-- Globeles Stylesheet -->
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='/css/word-for-friends.css'>
</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.php';?>

    <!-- content section -->
    <section class="basic-padding">

        <!-- headline area -->
        <div class="headline-container primary-textcol master-head letter-spacing-small medium">
            
            <div class="headline"><div class="quadrat-text-element light-blue-bg quadrat-pos"></div>Create a custom</div>
            <div class="headline-subcontainer">
                <div class="headline">word for your friends
                    <object data="/rescources/svg/small-dot.svg" width="15px" height="15px"></object> 
                 </div> 
             </div>
                    
         </div>
        <!-- headline area end -->

        <!-- content area -->
        <div class="content-container">

            <div class="input-container">
                <div class="inner-container">
                    
                    <div class="input-head sub-head letter-spacing-small bold secondary-textcol">Word</div>

                    <form class="form" id="wordForFriends" method="POST">
                        <div class="input-field">
                            <input oninput="getFieldValue()" minlength="5" maxlength="5" autocomplete="off" class="third-head light-blue-bg" type="text" id="custom" placeholder=" ">
                            <label for="custom" class="form-lable paragraph medium light-blue-bg">input word</label>
                            <!-- info button -->
                            <div class="info-btn-position paragraph">
                                <?php require 'html_structures/infobutton.php';

                                    setInfoButton("Please enter a word you want to send your friends. 
                                    They can play this word as a challange.");
                                ?>
                            </div>
                        </div>
                        
                        <div class="input-head sub-head letter-spacing-small bold secondary-textcol" style="margin-top: 3vh;">Game Mode</div>
                        <div class="drop-down-container primary-white-bg">
                            <input type="text" class="textBox paragraph medium" value="Default Game" readonly>
                            <div class="options small-text medium">
                                <div onclick="showDropMenu('Default Game')" class="single-option">Default Game</div>
                                <div onclick="showDropMenu('Time Game')" class="single-option">Time Game</div>
                            </div>
                        </div>
                    </form>

                    <div class="special-input">
                        <div class="sub-head letter-spacing-small bold secondary-textcol">URL</div>
                        <input value=<?php echo '"'.$link_default_game.'"'; ?> autocomplete="off" class="paragraph medium light-blue-bg" type="text" id="friendURL" placeholder=" " readonly>
                        <button id="copyBtn" class="copyBtn blue-bg secondary-textcol paragraph" onclick="copyToClipboard()">C</button>
                    </div>

                </div>
            </div>

        </div>
        <!-- content area end -->

    </section>
    <!-- content section end -->

    <script>

    /* Updates the dynamic output field which displays the game link. 
       Each update happens after a letter gets entered in the input field */
    function getFieldValue() {
        const val = returnValue("custom");
        if(document.querySelector('.textBox').value === 'Default Game') {
            document.getElementById('friendURL').value = <?php echo "'".$link_default_game."'";?>;
        }else {
            document.getElementById('friendURL').value = <?php echo "'".$link_time_game."'";?>;
        }
        if(val === "") {
            return;
        }
        document.getElementById('friendURL').value += caesar_cipher(val, <?php echo "'".$_SESSION["CEASAR_KEY"]."'"; ?>, true)+"&ck="+<?php echo $_SESSION["CEASAR_KEY"]; ?>;
        console.log("Ceasar encrypt text: "+caesar_cipher(val, <?php echo "'".$_SESSION["CEASAR_KEY"]."'"; ?>, true));
    }

    /* Manages the dropdown logic. This function
       displays the correct game name as part of the link */
    function showDropMenu(showString) {
        document.querySelector('.textBox').value = showString;
        const val = returnValue("custom");
        if(returnValue("custom") === "") {
            if(document.querySelector('.textBox').value === 'Default Game') {
                document.getElementById('friendURL').value = <?php echo "'".$link_default_game."'";?>;
            }else {
                document.getElementById('friendURL').value = <?php echo "'".$link_time_game."'";?>;
            }
        }else {
            getFieldValue();
        }
        
    }

    /* Manages the dropdown visibility logic */
    let dropdown = document.querySelector('.drop-down-container');
    dropdown.onclick = function() {
        dropdown.classList.toggle('active');
    }
    
    </script>
    <script src="/js/wordforfriends.js"></script>

</body>
</html>