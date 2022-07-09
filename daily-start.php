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
    <?php include 'html_structures/nav.html'; ?>

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
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas</div>
                        <div class="time">Time: 00:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Maurice</div>
                        <div class="time">Time: 00:15:04</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas12</div>
                        <div class="time">Time: 01:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas153</div>
                        <div class="time">Time: 02:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas13</div>
                        <div class="time">Time: 03:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas14</div>
                        <div class="time">Time: 04:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas15</div>
                        <div class="time">Time: 05:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas21</div>
                        <div class="time">Time: 06:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas22</div>
                        <div class="time">Time: 07:12:64</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="username">Username: Lukas24</div>
                        <div class="time">Time: 08:12:64</div>
                    </div>

                </div>
                <!-- daily history end -->
            </div>
            <!-- user information area end -->

            <!-- Start btn -->
            <div class="main-button red-bg  main-btn-pos red-btn-shadow">
                <a class="secondary-textcol letter-spacing-big medium paragraph" href="gamemodis.php">Start Daily Challenge</a>
            </div>
            <!-- start btn end -->

        </div>
        <!-- content area end -->

    </section>
</body>

</html>