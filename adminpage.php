<?php
require_once "php/functions.php";
require_once 'php/db.conn.php';

function sugWordBoard()
{
    $sql = "SELECT * FROM " . TAB_SWORDS . " ORDER BY SWID;";
    $counter = 1;
    $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));


    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="history-card sub-head primary-textcol medium light-blue-bg">';
        echo    '<div class="username">Wort: '.$row["swWord"]. '</div>';
        echo    '<button name="accept'.$counter.'" onclick="submitSugWord('.$row["swWord"].','.$row["UID"].')" type="submit" class="sug-word-button sub-head medium green-bg">Accept</button>';
        echo    '<button name="decline'.$counter.'" onclick="submitSugWord('.$row["swWord"].','.$row["UID"].')" type="submit" class="sug-word-button sub-head medium red-bg">Decline</button>';
        echo '</div>';

        $counter += 1;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Wordle</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Globeles Stylesheet -->
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/adminpage.css'>

</head>

<body>
    <!-- add header -->

    <?php include 'html_structures/nav.php'; ?>

    <section class="basic-padding">

        <!-- content area -->
        <div class="content-container">

            <!-- headline -->
            <div class="headline-container primary-textcol master-head letter-spacing-small medium">
                <div class="headline">Adminpage
                    <object data="/rescources/svg/small-dot.svg" width="20px" height="20px"></object>
                    <div class="quadrat-text-element light-blue-bg quadrat-pos"></div>
                </div>

            </div>


            <!-- area admin -->
            <div class="content-container-admin">

                <!-- statistics -->
                <div class="stats-left light-blue-bg">
                    <div class="headline-stats sub-head letter-spacing-small medium">
                        Page statistics
                    </div>

                    <div class="content-stats paragraph letter-spacing-small">
                        <div class="stats">Registierte Accounts: 1243</div>
                        <div class="stats">Anzahl der Wörter: 72673</div>
                        <div class="stats">Spiele an der Daily-Challenge: 23</div>

                    </div>

                </div>

                <!-- sug words -->

                <!-- dynamic data -->
                <div class="sug-words-board">
                    <form id="sugWordForm" class="form" action="/php/sugWord.php" method="POST">
                        <!-- card setup for dynamic data from db -->

                        

                        <?php sugWordBoard(); ?>

                        <input id="idSwWord" name="idSwWord" type="text" hidden>
                        <input id="swWord" name="swWord" type="text" hidden>
                        <input id="countWords" name="countWords" type="number" value="<?php echo $counter ?>" hidden>
                        

                    </form>

                </div>

                

                <!-- sug words end -->
            </div>
            <!-- admin information area end -->



        </div>
        <!-- content area end -->

    </section>

    <script> 
        function submitSugWord(word, uid){
            document.querySelector('#swWord').value=word;
            document.querySelector('#idSwWord').value=uid;

            document.querySelector('#sugWordForm').submit();

        }
    </script>

</body>

</html>