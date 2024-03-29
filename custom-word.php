<?php
    session_start();
    if (!isset($_SESSION["uid"])) {
        header("location: ../login.php");
        exit();
    } 
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Worlde</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Globeles Stylesheet -->  
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='/css/custom-word.css'>
</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.php'; ?>
    
    <section class="basic-padding">

        <!-- headline area -->
        <div class="headline-container primary-textcol master-head letter-spacing-small medium">
            <div class="headline"><div class="quadrat-text-element light-blue-bg quadrat-pos"></div>Send us a custom word to be</div>
            <div class="headline-subcontainer">
                 <div class="headline">part of the wordle community
                      <object data="/rescources/svg/small-dot.svg" width="15px" height="15px"></object>
                 </div> 
            </div>
            
         </div>
         <!-- headline area end -->

         <!-- content area -->
            <div class="content-container">

                <div class="input-container">
                    <div class="inner-container">
                        
                        <div class="input-head sub-head letter-spacing-small bold secondary-textcol">Your own word in wordle</div>

                        <form class="form" action="/php/addnewword.php" method="POST">
                            <div class="input-field">
                                <input minlength="5" maxlength="5" autocomplete="off" class="third-head light-blue-bg" type="text" id="custom" name="custom" placeholder=" ">
                                <label for="custom" class="form-lable paragraph medium light-blue-bg">input word</label>
                                <!-- info button -->
                                <div class="info-btn-position paragraph">
                                    <?php require 'html_structures/infobutton.php';

                                        setInfoButton("Please enter a word you think could benefit the wordle community. 
                                        Other palyers will be notified when they played your word :)");
                                    ?>
                                </div>
                            </div>
                            
                            <!-- cta button -->
                            <div class="cta-btn">
                                    <button name="submitWord" type="submit" class="main-button blue-bg paragraph letter-spacing-big secondary-textcol">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
         <!-- content area end -->

    </section>
</body>
</html>