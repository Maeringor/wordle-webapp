<?php 
session_start();
    if (!isset($_SESSION["uid"])) {
        header("location: ../login.php");
        exit();
    } ?>
<?php 
    require_once 'php/config.php';
    require_once 'php/functions.php';

    // if db shows a user other then admin set var
    $entered_word_by;
    $rand_word = "";
    $key_for_custom_word = 0;

    // set rand word from database on daily basis (check for current date on Server vs on Databse)
    $server_date = date("Y-m-d");
    if (!equalDates($server_date, getCurrentDailyWord_Date())) {
        $rand_word = setNewDailyWord($server_date);
    } else {
        $rand_word = getCurrentDailyWord_Word();
    }

    function equalDates($date1, $date2) {
        if ($date1 != $date2) {
            return false;
        }
        return true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Wordle</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- Globeles Stylesheet -->
        <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>

        <link rel='stylesheet' type='text/css' media='screen' href='/css/default-game.css'>
</head>
<body>
    <!-- add header -->
    <?php include 'html_structures/nav.php'; ?>

    <!-- content section -->
    <section class="basic-padding">
        <div class="content-container">

            <div class="info-container">
                <!-- info button -->
                <div class="info-btn-position paragraph">
                    <?php require 'html_structures/infobutton.php';

                        setInfoButton("Enter letters via your keyboard or by clicking on one of the letters. 
                        Press submit to verify your guess. Try to find the word. <br><br> <span class='bold'>Good luck!</span>");
                    ?>  
                </div>

                <div class="time-container small-text medium secondary-textcol letter-spacing-small">
                    <div class="time-head">Time: </div>
                    <div class="time" id="time"></div>
                </div>
            </div>

            <!-- word field area -->
            <!-- only hardcoded for the default mode -->
            <div class="words">
                <div class="words-container">
                    <div class="word-row">
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                    </div>
                    <div class="word-row">
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                    </div>
                    <div class="word-row">
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                    </div>
                    <div class="word-row">
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                    </div>
                    <div class="word-row">
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                    </div>
                    <div class="word-row">
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                        <div class="word"></div>
                    </div>
                </div>
                <div class="submit-container">
                    <button data-key="enter" class="main-button main-btn-shadow blue-bg secondary-textcol paragraph medium letter-spacing-small">Submit my answer</button>
                </div>
                
            </div>
            <!-- word field area end -->

            <div class="keyboard">
                <div class="keyboard-container">
                    <div>
                        <button id="A" data-key="A">A</button>
                        <button id="B" data-key="B">B</button>
                        <button id="C" data-key="C">C</button>
                        <button id="D" data-key="D">D</button>
                        <button id="E" data-key="E">E</button>
                        <button id="F" data-key="F">F</button>
                    </div>
                    <div>
                        <button id="G" data-key="G">G</button>
                        <button id="H" data-key="H">H</button>
                        <button id="I" data-key="I">I</button>
                        <button id="J" data-key="J">J</button>
                        <button id="K" data-key="K">K</button>
                        <button id="L" data-key="L">L</button>
                    </div>
                    <div>
                        <button id="M" data-key="M">M</button>
                        <button id="N" data-key="N">N</button>
                        <button id="O" data-key="O">O</button>
                        <button id="P" data-key="P">P</button>
                        <button id="Q" data-key="Q">Q</button>
                        <button id="R" data-key="R">R</button>
                    </div>
                    <div>
                        <button id="S" data-key="S">S</button>
                        <button id="T" data-key="T">T</button>
                        <button id="U" data-key="U">U</button>
                        <button id="V" data-key="V">V</button>
                        <button id="W" data-key="W">W</button>
                        <button id="X" data-key="X">X</button>
                    </div>
                    <div>
                        <button id="Y" data-key="Y">Y</button>
                        <button id="Z" data-key="Z">Z</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- popup -->
        <div class="popup display-none">
            <div class="popup-container">
                <form action="/php/handlegameend.php" method="POST" id="timeForm">
                    <!-- inputs for the data from the game to write in the database -->
                    <input id="timeFieldCU" name="timeFieldCU" type="number" hidden>

                    <div class="sub-head green-bg primary-textcol bold letter-spacing-small" style="margin-bottom: 2vh; border-radius: 8px;">
                        You won!
                    </div>
                    <div class="top-text paragraph primary-textcol medium letter-spacing-small">
                        Continue to save your progress!
                    </div>
                    <?php 
                        if (isset($entered_word_by) && $entered_word_by != "") {
                            echo "<div class='top-text small-text primary-textcol letter-spacing-small'>Word submitted by: " .$entered_word_by. "</div>";
                        }
                    ?>

                    <div class="btn-continue-container">
                        <button name="submitGameEnd" type="submit" class="btn-continue blue-bg secondary-textcol small-text main-btn-shadow letter-spacing-small">Continue</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- popup end -->

    </section>
    <!-- content section end -->

    <script src="/js/defaultgamelogic.js"></script>
    <script src="/js/wordforfriends.js"></script>
    
    <script>
        setInitGameValues(<?php echo "'".$rand_word."'"; ?>, true, false);

        window.onload = function () {
            var maxMinutesCU = 60 * 1,
            display = document.querySelector('#time'),
            hiddenInput = document.querySelector('#timeFieldCU'),
            timeForm = document.querySelector('#timeForm');
            startTimerCU(maxMinutesCU, display, hiddenInput);
        };
    </script>

</body>
</html>