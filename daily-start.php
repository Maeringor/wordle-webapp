<?php
require_once 'php/db.conn.php';

function createDailyLeaderboard() {
    $server_date = date("Y-m-d");
    $sql = "SELECT * FROM ".TAB_DSCORE. " join ".TAB_USER. " ON ".TAB_DSCORE.".UID =" .TAB_USER.".UID WHERE DDATE = '$server_date' ORDER BY DTIME;";

    $result = mysqli_query(conn_globale, $sql) or die(mysqli_error(conn_globale));
    
    while($row = mysqli_fetch_array($result)){

        $time = $row["DTIME"];
        //$time = str_replace("00:", "", $time);
        $time = preg_replace('/' .'00:'.'/', "", $time, 1);

        echo '<div class="history-card sub-head primary-textcol medium light-blue-bg">';
        echo '<div class="username">Username: ' .$row["UName"] .'</div>';
        echo '<div class="time">Time: ' .$time. '</div>';
        echo '</div>';
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
    <link rel='stylesheet' type='text/css' media='screen' href='/css/daily-start.css'>

</head>

<body>
    <!-- add header -->

    <?php include 'html_structures/nav.php'; ?>

    <section class="basic-padding">

        <!-- content area -->
        <div class="content-container">

            <!-- headline -->
            <div class="headline-container primary-textcol master-head letter-spacing-small medium">
                <div class="headline">Daily Challenge
                    <object data="/rescources/svg/small-dot.svg" width="20px" height="20px"></object>
                    <div class="quadrat-text-element light-blue-bg quadrat-pos"></div>
                </div>

            </div>

            <!-- daily challenge -->
            <div class="content-container-daily">

                <!-- descirption-->
                <div class="desc-left light-blue-bg">
                    <div class="headline-desc sub-head letter-spacing-small medium">
                        The Daily Challenge
                    </div>

                    <div class="content-desc paragraph letter-spacing-small">
                        Our Daily Challenge allows You to guess a new word every day. <br>You have unlimited time and an infinite number of attempts.
                        <br>The faster You are, the higher you will be on the daily leaderboard <br>and You can compete with others every day.
                        <br><br>Good Luck!
                    </div>

                </div>

                <!-- daily history -->
                <!-- dynamic data -->
                <div class="daily-board">
                    <!-- card setup for dynamic data from db -->
                    <?php createDailyLeaderboard(); ?>
                </div>
                <!-- daily history end -->
            </div>
            <!-- user information area end -->

            <!-- Start btn -->
            <div class="daily-start-btn red-bg  main-btn-pos red-btn-shadow letter-spacing-big paragraph">
                <a class="secondary-textcol medium" href="daily-game">Start Daily Challenge</a>
            </div>
            <!-- start btn end -->

        </div>
        <!-- content area end -->

    </section>
</body>
</html>