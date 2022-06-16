<?php require "php/config.php"; 

if($WEB_PORT != "") {
    $local_web_port = ":".$WEB_PORT;
}

// send user id -- but not as link varaiable
$active_userID = 1221;
$link = $WEB_PROTOCOL."://".$WEB_URL.$local_web_port."/default-game.php?word=".$custom_word;

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

                    <form class="form" action="">
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

                        <div class="drop-down-container">

                        </div>
                    </form>

                    <div class="special-input">
                        <div class="sub-head letter-spacing-small bold secondary-textcol">URL</div>
                        <input value=<?php echo '"'.$link.'"'; ?> autocomplete="off" class="paragraph medium light-blue-bg" type="text" id="friendURL" placeholder=" " readonly>
                        <button id="copyBtn" class="copyBtn" onclick="copyToClipboard()">C</button>
                    </div>

                </div>
            </div>

        </div>
        <!-- content area end -->

    </section>
    <!-- content section end -->

    <script src="/js/wordforfriends.js"></script>

 <script>
    function getFieldValue() {
        const val = document.getElementById('custom').value;
        document.getElementById('friendURL').value = <?php echo "'".$link."'";?>;
        document.getElementById('friendURL').value += val;
    }
</script>
    

</body>
</html>