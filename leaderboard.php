<?php 
require_once "php/functions.php";
require_once 'php/db.conn.php';


if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
} 

function createLeaderboard(){
    $sql = "SELECT * FROM ".TAB_USER." ORDER BY UScore DESC;";

    $result = mysqli_query(conn_globale , $sql) or die(mysqli_error(conn_globale));

    $ranking = 1;

    
        while($row = mysqli_fetch_array($result)){

            echo '<div class="history-card sub-head primary-textcol medium light-blue-bg">';
            echo '<div class="">' .$ranking. '.</div>';
            echo '<div class="">' .$row["UName"]. '</div>';
            echo '<div class="">' .$row["UScore"]. '</div>';
            echo '</div>';

            $ranking+=1;
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
    <link rel='stylesheet' type='text/css' media='screen' href='/css/leaderboard.css'>

</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.php'; ?>



    <section class="basic-padding">

        <!-- content area -->
        <div class="content-container">





            <!-- leaderboard -->
            <div class="content-container-leaderboard">

                <!-- profil infos -->
                <?php
                if (isset($_SESSION["uid"])) {

                    echo '<div class="profil-infos-container light-blue-bg">';
                    echo    '<div class="container-container">';
                    echo        '<div class=" profil-header sub-head bold">Your Profile </div>';
                    echo            '<div class="profil-content sub-head">';
                    echo                '<div class="" style=""> Platz ' . getPlace($_SESSION["uname"]) . '</div>';
                    echo                '<div class="" style="padding: center;">' . $_SESSION["uname"] . '</div>';
                    echo                '<div class="" style="">Score ' . getScore($_SESSION["uname"]) . '</div>';
                    echo            '</div>';
                    echo        '</div>';
                    echo  '</div>';
                }
                ?>
                <!-- profil inofs end -->



                <!-- leaderboard headline -->
                <div class="leaderboard-header third-head bold">
                    Leaderboard
                </div>

                <!-- leaderboard history -->
                <!-- dynamic data -->
                <div class="leaderboard-board">


                    <!-- card setup for dynamic data from db -->
                   <?php createLeaderboard(); ?>
                    

                </div>
                <!-- leaderboard history end -->
            </div>
            <!-- leaderboard end -->

        </div>
        <!-- content area end -->

    </section>
</body>

</html>